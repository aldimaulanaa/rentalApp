@if(auth()->check())
    <form action="/logout" method="POST">
        @csrf
        <button type="submit">Keluar</button>
    </form>
@endif
