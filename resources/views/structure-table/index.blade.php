<div class="card">
    <div class="card-header d-flex justify-content-between">
        <h2>Create Structure Table {{ $table->title }}</h2>
            <form action="{{ route('structureTable.store') }}" method="POST">
                @csrf
                <input type="hidden" name="table_id" id="table_id" value="{{$table->id}}" class="form-control" >
                <div class="form-group">
                    <label for="name">Field</label>
                    <input type="text" name="name" id="name" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="data_type">Data Type</label>
                    <select name="data_type" id="data_type" class="form-control">
                        @foreach ($dataTypes as $dataType)
                            <option value="{{$dataType->nama}}">{{$dataType->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="length">Length</label>
                    <input type="number" name="length" id="length" value="" class="form-control" >
                </div>
                <div class="form-group">
                    <label for="form_input_type">Type Form Input</label>
                    <select name="form_input_type" id="form_input_type" class="form-control">
                        @foreach ($formInputTypes as $formInputType)
                            <option value="{{$formInputType->nama}}">{{$formInputType->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="nullable">Nullable</label>
                    <select name="nullable" id="nullable" class="form-control">
                        <option value="->nullable()">Yes</option>
                        <option value="-">No</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="default">Default</label>
                    <select name="default" id="default" class="form-control">
                        <option value="true">Yes</option>
                        <option value="false">No</option>
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
                    <th>Name</th>
                    <th>Data Type</th>
                    <th>Length</th>
                    <th>form input type</th>
                    <th>Nullable</th>
                    <th>Default</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($structureTables as $structureTable)
                <tr>
                    <td>{{$structureTable->id}}</td>
                    <td>{{$structureTable->name}}</td>
                    <td>{{$structureTable->type_data}}</td>
                    <td>{{$structureTable->length}}</td>
                    <td>{{$structureTable->type_forminput}}</td>
                    <td>{{$structureTable->is_nullable}}</td>
                    <td>{{$structureTable->default}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <h3><a href="{{ route('StructureTable-generateTable', $table->id) }}">Generate Table</a></h3>
    </div>
</div>
