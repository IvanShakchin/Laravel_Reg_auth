<!DOCTYPE html>
<head>   
      <title> @if ($action == 'create') Добавить адрес @else  Изменить адрес @endif  </title>
</head>
<body>
   <h2> @if ($action == 'create') Добавить адрес @else  Изменить адрес @endif  </h2>
   <form name="address" method="post" action="@if ($action == 'create'){{ route('addresses.store')}}@else{{ route('addresses.update',['address' => $address])}}@endif">
   @csrf
   {{-- update принмает запросы PUT / PATCH а create POST --}}
   @if ($action == 'edit') @method('PUT')  @endif
   <label for='address'> Адрес:</label>
   <input type='text' name='address' id='address' value='@if ($action == 'create'){{old('address')}}@else{{$address->address}}@endif'>
   @error('address')
      <span>{{ $message }}</span>
   @enderror
   <br/><br/>
   <input type='submit' value='@if ($action == 'create') Добавить @else Изменить @endif'>
   </form>
</body>
</html>

