<div>
    <table class="table table-striped">
        @foreach ($petitions as $item)
            <tr>

            <td class="text-sm">
            <a href="#"> {{ $item->title }}  </a>
            </td>
            <td class="text-sm"> created {{ $item->created_at->diffForHUmans() }}</td>
            </tr>
        @endforeach
    </table>
</div>
