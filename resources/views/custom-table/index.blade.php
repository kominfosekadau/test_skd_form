
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <form action="{{ route('customTable.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nama Tabel</label>
                    <input type="text" name="name" id="name" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="descripsi">Deskripsi</label>
                    <input type="text" name="descripsi" id="descripsi" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="aktif">Aktif</label>
                    <select name="aktif" id="aktif" class="form-control">
                        <option value="0">NO</option>
                        <option value="1">YES</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">SAVE</button>
            </form>
        </div>
        <div class="card-body  table-responsive">
            <table class="table table-bordered data-table" width="100%" border="1" margin="center">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Judul Table</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($datas as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->title}}</td>
                        <td>{{$item->description}}</td>
                        <td>{{$item->is_published}}</td>
                        <td><a href="{{route('StructureTableController-index',$item->id)}}">Create Structure Table</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>