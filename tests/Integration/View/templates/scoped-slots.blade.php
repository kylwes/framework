<x-table :numbers="$numbers">

  <x-slot name="body" scoped>
    <td>Number: {{ $number }}</td>
  </x-slot>

</x-table>
