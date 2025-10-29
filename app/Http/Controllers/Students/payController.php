<?php

namespace App\Http\Controllers\Students;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\SendMail;

use App\Models\Student;
use App\Models\Payment;
use App\Models\Enrollment;
use App\Models\Checkout;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Mail;


class payController extends Controller
{
    public function store(Request $request)
    {
        $user = Student::findOrFail(currentUserId());
        $txnid = "SSLCZ_TXN_" . uniqid(); // Tạo mã giao dịch duy nhất


        //$settings = Generalsetting::findOrFail(1);
        // Lưu thông tin đơn hàng vào checkout
        $cart_details = array('cart' => session('cart'), 'cart_details' => session('cart_details'));

        $check = new Checkout;
        $check->cart_data = base64_encode(json_encode($cart_details));
        $check->student_id = $user->id;
        $check->txnid = $txnid;
        $check->status = 0;
        $check->save();

        $deposit = new Payment;
        $deposit->student_id = $user->id;
        $deposit->currency = "BDT";
        $deposit->currency_code = "BDT";
        $deposit->amount = session('cart_details')['total_amount'];
        $deposit->currency_value = 1;
        $deposit->method = 'SSLCommerz';
        $deposit->txnid = $txnid;
        $deposit->save();


        foreach (array_keys($cart_details['cart']) as $key) { // chỉ duyệt key (chính là id khoá học)
            $enrollment = new Enrollment;
            $enrollment->student_id = $user->id;
            $enrollment->course_id = $key;
            $enrollment->enrollment_date = now();
            $enrollment->save();
        }

        // Lưu vào bảng tuyển sinh


        // Gửi mail
        // dd(session());
        $email_student = encryptor('decrypt', session('emailAddress'));
        $info = [
            'total' => (float) session('cart_details')['total_amount'],
            'email_student' => $email_student,
            'name_student' => encryptor('decrypt', session('userName')),

        ];
        // dd($info);

        Mail::to($email_student)->send(new SendMail($cart_details['cart'], $info));

        return redirect()->route('register.success');
    }


    public function cancel(Request $request)
    {
        $input = $request->all();
        $deposit = Payment::where('txnid', '=', $input['tran_id'])->orderBy('created_at', 'desc')->first();
        $student = Student::findOrFail($deposit->student_id);
        $this->setSession($student);
        return redirect()->route('studentdashboard')->with('danger', 'Payment Cancelled.');
    }


    public function notify(Request $request)
    {
        $cancel_url = action([payController::class, 'cancel']);
        $input = $request->all();
        if ($input['status'] == 'VALID') {
            $deposit = Payment::where('txnid', '=', $input['tran_id'])->orderBy('created_at', 'desc')->first();

            $check = Checkout::where('txnid', '=', $input['tran_id'])->orderBy('created_at', 'desc')->first();
            $check->status = 1;
            $check->save();

            $student = Student::findOrFail($deposit->student_id);
            $this->setSession($student);

            $deposit->status = 1;
            $deposit->save();

            // store in transaction table
            if ($deposit->status == 1) {
                foreach (json_decode(base64_decode($check->cart_data))->cart as $key => $course) {
                    $enrole = new Enrollment;
                    $enrole->student_id = $check->student_id;
                    $enrole->course_id = $key;
                    $enrole->enrollment_date = date('Y-m-d');
                    $enrole->save();
                }
            }
            return redirect()->route('studentdashboard')->with('success', 'Payment done!');
        } else {
            return redirect()->route('studentdashboard')->with('danger', 'Vui lòng thử lại!');
        }
    }

    public function setSession($student)
    {
        return request()->session()->put(
            [
                'userId' => encryptor('encrypt', $student->id),
                'userName' => encryptor('encrypt', $student->name_en),
                'emailAddress' => encryptor('encrypt', $student->email),
                'studentLogin' => 1,
                'image' => $student->image ?? 'No Image Found'
            ]
        );
    }
}
