<div class="card">
    <div class="card-header d-flex justify-content-between">
        @foreach ($dataCustomTables as $form)
            <form action="{{ route('customValue.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">{{ $form->title }}</label>
                </div>
                <input type="hidden" name="table_id" id="table_id" value="{{$form->id}}" class="form-control" >
                @foreach ($dataCustomFields as $label)
                    @if ($form->id == $label->table_id)
                        <div class="form-group">
                            <label for="name">{{ $label->label }}</label>
                            <input type="text" name="{{ $label->id }}" id="{{ $label->id }}" value="" class="form-control" >
                        </div>
                    @endif
                @endforeach
                <button type="submit" class="btn btn-primary">SAVE</button>
                <a href="{{ route('customValue.show', $form->id) }}">View Data</a>
            </form>
        @endforeach
    </div>
    <div class="card-body  table-responsive">
        @foreach ($dataCustomTables as $table)
            <table class="table table-bordered data-table" width="100%" border="1" margin="center">
                <thead>
                    <tr>
                        <th >{{$table->title}}</th>
                    </tr>
                    <tr>
                        @foreach ($dataCustomFields as $kolom)
                            @if ($table->id == $kolom->table_id)
                            <th>{{$kolom->label}}</th>
                            @endif
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataCustomFields as $dataCustomField)
                        @if ($table->id == $kolom->table_id)
                        @php

                        @endphp
                        @endif
                    @endforeach
                </tbody>
            </table>
        </br>
        @endforeach
    </div>
</div>
