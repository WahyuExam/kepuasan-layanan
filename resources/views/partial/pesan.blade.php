@if (Session::has('alerts'))
  @foreach(Session::get('alerts') as $alert)
    <div class="alert alert-{{ $alert['type'] }}">{!! $alert['text'] !!}</div>
  @endforeach
@endif