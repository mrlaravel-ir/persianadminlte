@component('admin.layouts.content' , ['title' => 'دسترسی ها'])
    @slot('breadcrumb')
        <li class="breadcrumb-item"><a href="/admin">پنل مدیریت</a></li>
        <li class="breadcrumb-item active">دسترسی ها</li>
    @endslot

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">دسترسی ها</h3>

                    <div class="card-tools d-flex">
                        <form action="">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="search" class="form-control float-right" placeholder="جستجو" value="{{ request('search') }}">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group-sm mr-1">
                            @can('create-permission')
                                <a href="{{ route('admin.permissions.create') }}" class="btn btn-info">ایجاد دسترسی جدید</a>
                            @endcan
                        </div>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <th>نام دسترسی</th>
                                <th>توضیح دسترسی</th>
                                <th>اقدامات</th>
                            </tr>

                            @foreach($permissions as $permission)
                                <tr>
                                    <td>{{ $permission->name }}</td>
                                    <td>{{ $permission->label }}</td>
                                    <td class="d-flex">
                                        @can('delete-permission')
                                            <form action="{{ route('admin.permissions.destroy' ,  $permission->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger ml-1">حذف</button>
                                            </form>
                                        @endcan
                                        @can('edit-permission')
                                            <a href="{{ route('admin.permissions.edit' ,$permission->id) }}" class="btn btn-sm btn-primary">ویرایش</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach


                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                    {{ $permissions->render() }}
                </div>
            </div>
            <!-- /.card -->
        </div>
    </div>

@endcomponent
