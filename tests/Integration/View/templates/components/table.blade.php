@props(['numbers'])

<table>
  <tbody>
    @foreach($numbers as $number)
      <tr>
        {{ $body->scoped(['number' => $number]) }}
      </tr>
    @endforeach
  </tbody>
</table>
