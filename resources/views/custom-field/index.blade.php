
    <div class="card">
        <div class="card-header d-flex justify-content-between">
            <form action="{{ route('customField.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="table">Pilih Tabel</label>
                    <select name="table" id="table" class="form-control">
                        @foreach ($dataCustomTables as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Nama Kolom</label>
                    <input type="text" name="name" id="name" value="" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="typedata">Type Data</label>
                    <select name="typedata" id="typedata" class="form-control">
                        <option value="integer">Integer</option>
                        <option value="string">String</option>
                        <option value="boolean">boolean</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="required">Required</label>
                    <select name="required" id="required" class="form-control">
                        <option value="0">No</option>
                        <option value="1">Yes</option>
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
                        <th>Nama Table</th>
                        <th>Nama Kolom</th>
                        <th>Tipe Data</th>
                        <th>Required</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataCustomFields as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->table_id}}</td>
                        <td>{{$item->label}}</td>
                        <td>{{$item->type}}</td>
                        <td>{{$item->is_required}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>