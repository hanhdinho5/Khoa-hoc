@extends('backend.layouts.app')
@section('title', trans('Role List'))

@push('styles')
    <!-- Datatable -->
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@section('content')
    <style>
        .action-buttons {
            gap: 8px;
            /* khoảng cách giữa các nút */
        }

        .action-btn {
            border-radius: 8px;
            padding: 6px 10px;
            transition: all 0.2s ease-in-out;
            font-size: 14px;
        }

        .action-btn i {
            font-size: 16px;
        }

        /* Hiệu ứng hover từng loại nút */
        .action-btn.btn-outline-primary:hover {
            background-color: #007bff;
            color: #fff;
            transform: translateY(-2px);
        }

        .action-btn.btn-outline-secondary:hover {
            background-color: #6c757d;
            color: #fff;
            transform: translateY(-2px);
        }

        .action-btn.btn-outline-danger:hover {
            background-color: #dc3545;
            color: #fff;
            transform: translateY(-2px);
        }
    </style>

    <div class="content-body">
        <!-- row -->
        <div class="container-fluid">

            <div class="row page-titles mx-0">
                <div class="col-sm-6 p-md-0">
                    <div class="welcome-text">
                        <h4>Danh sách vai trò</h4>
                    </div>
                </div>
                <div class="col-sm-6 p-md-0 justify-content-sm-end mt-2 mt-sm-0 d-flex">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Trang chủ</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('role.index') }}">Vai trò</a></li>
                        <li class="breadcrumb-item active"><a href="{{ route('role.index') }}">Danh sách vai trò</a></li>
                    </ol>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="row tab-content">
                        <div id="list-view" class="tab-pane fade active show col-lg-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Danh sách tất cả vai trò</h4>
                                    <a href="{{ route('role.create') }}" class="btn btn-primary">+ Thêm mới</a>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example3" class="display" style="min-width: 845px">
                                            <thead>
                                                <tr>
                                                    <th>{{ __('#') }}</th>
                                                    <th>{{ __('Tên') }}</th>
                                                    <th>{{ __('Danh tính') }}</th>
                                                    <th>{{ __('Hoạt động') }}</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($data as $d)
                                                    <tr>
                                                        <td>{{ ++$loop->index }}</td>
                                                        <td><strong>{{ $d->name }}</strong></td>
                                                        <td>{{ $d->identity }}</td>
                                                        <td class="text-start">
                                                            <div
                                                                class="action-buttons d-flex justify-content-start align-items-center">
                                                                <a href="{{ route('role.edit', encryptor('encrypt', $d->id)) }}"
                                                                    class="btn btn-sm btn-outline-primary action-btn"
                                                                    title="Chỉnh sửa">
                                                                    <i class="la la-edit"></i>
                                                                </a>

                                                                <a href="{{ route('permission.list', encryptor('encrypt', $d->id)) }}"
                                                                    class="btn btn-sm btn-outline-secondary action-btn"
                                                                    title="Phân quyền">
                                                                    <i class="la la-unlock-alt"></i>
                                                                </a>

                                                                <button type="button"
                                                                    class="btn btn-sm btn-outline-danger action-btn"
                                                                    title="Xóa"
                                                                    onclick="if(confirm('Bạn có chắc muốn xóa vai trò này không?')) $('#form{{ $d->id }}').submit();">
                                                                    <i class="la la-trash"></i>
                                                                </button>
                                                            </div>

                                                            <form id="form{{ $d->id }}"
                                                                action="{{ route('role.destroy', encryptor('encrypt', $d->id)) }}"
                                                                method="post" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>
                                                        </td>

                                                    </tr>
                                                @empty
                                                    <tr>
                                                        <th colspan="7" class="text-center">Không thấy người dùng</th>
                                                    </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection

@push('scripts')
    <!-- Datatable -->
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/plugins-init/datatables.init.js') }}"></script>
@endpush
