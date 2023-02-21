<div class="card">
    <div class="card-body  table-responsive">
        <table class="table table-bordered data-table" width="100%" border="1" margin="center">
            <thead>
                <tr>
                    <th colspan="{{ $n_rowSpan }}">{{ $table_name }}</th>
                </tr>
                <tr>
                    @foreach ($dataTH as $th)
                        <th>{{ $th->label }}</th>
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @for ($i = 1; $i <= $no; $i++)
                <tr>
                    @foreach ($values as $value)
                        @if ($i == $value->no)
                        <td>{{ $value->value }}</td>
                        @endif
                    @endforeach
                </tr>                
                @endfor
            </tbody>
        </table>
    </div>
</div>
