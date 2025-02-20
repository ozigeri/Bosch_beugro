@extends('layouts.app')

@section('content')
<div class="container" style="margin-top: 10px">
    <h2>Productions</h2>

    <select id="pcbFilter" class="form-select mb-3">
        <option value=""> Select PCB </option>
        @foreach($products as $product)
            <option value="{{ $product->PCB }}">{{ $product->PCB }}</option>
        @endforeach
    </select>

    <div id="productions">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>PCB</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productions as $production)
                    <tr data-pcb="{{ $production->product->PCB }}">
                        <td>{{ $production->id }}</td>
                        <td>{{ $production->product->name }}</td>
                        <td>{{ $production->product->PCB }}</td>
                        <td>
                            <button class="btn btn-danger delete-btn" data-id="{{ $production->id }}">X</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function () {
    $('#pcbFilter').on('change', function () {
        let PCB = $(this).val();
        $('tbody tr').each(function () {
            if (PCB === "" || $(this).data('pcb') == PCB) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    $('.delete-btn').on('click', function () {
        if (confirm('Biztosan szeretnéd törlöni ezt a sort?')) {
            let id = $(this).data('id');
            $.ajax({
                url: `/production/${id}`,
                type: 'DELETE',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function () {
                    location.reload();
                }
            });
        }
    });
});
</script>
@endsection
