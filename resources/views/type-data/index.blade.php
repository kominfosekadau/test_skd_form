<div class="card">
    <div class="card-header d-flex justify-content-between">
            <form action="{{ route('typeData.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="" class="form-control" >
                </div>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </form>
    </div>
    <div class="card-body  table-responsive">
        <table class="table table-bordered data-table" width="100%" border="1" margin="center">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($datas as $data)
                    <tr>
                        <td>{{$data->id}}</td>
                        <td>{{$data->nama}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
