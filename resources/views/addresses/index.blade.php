<!DOCTYPE HTML>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Under Construction</title>
 
<style type="text/css">
    .page_404{ padding:40px 0; background:#fff; font-family: 'Arvo', serif;
    }

    .page_404  img{ width:100%;}

    .four_zero_four_bg{
    
    background-image: url(https://cdn.dribbble.com/users/285475/screenshots/2083086/dribbble_1.gif);
        height: 400px;
        background-position: center;
    }
    
    
    .four_zero_four_bg h1{
    font-size:80px;
    }
    
    .four_zero_four_bg h3{
                font-size:80px;
                }
                
                .link_404{			 
        color: #fff!important;
        padding: 10px 20px;
        background: #39ac31;
        margin: 20px 0;
        display: inline-block;}
        .contant_box_404{ margin-top:-50px;}
</style>
</head>
<body>

    
<head>
 
  
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css'>
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Arvo'>
    
  </head>
  
  <body>
  
    <section class="page_404">
      <div class="container">
          <div class="row">	
          <div class="col-sm-12 ">
          <div class="col-sm-10 col-sm-offset-1  text-center">
          <div class="four_zero_four_bg">
              <ul>
                @foreach ( $addresses as $address )                
                <li>
                    
                    @can('view',$address)
                    <a href="{{ route('addresses.show', ['address' => $address]) }}"> {{ $address->address }} </a>
                    @else
                        <span>Нельзя просмотреть</span>
                    @endcan    
                    
                    @can('update',$address)
                    <a href="{{ route('addresses.edit', ['address' => $address]) }}"> Редактировать</a>
                     @else
                        <span>Нельзя редактировать</span>
                    @endcan  

                    @can('update',$address)
                    <form nama='delete' method='post' action='{{ route('addresses.destroy', ['address' => $address]) }}'>
                    @csrf                    
                    @method('DELETE')
                    <input type='submit' value='Удалить' />
                    </form>
                    @else
                        <span>Нельзя удалять</span>
                    @endcan  


                </li>
                @endforeach
                
                {{-- тут передаем модель App\Models\Address::class --}}
                @can('create',App\Models\Address::class)
                <li>
                    <a href='{{ route('addresses.create') }}'>Добваить адрес</a>
                </li>
                @endcan  

                @can('my', [App\Models\Address::class, 11])
                    <h4>Функция my отработала, доступ есть</h4>
                @endcan  

              </ul>       
          </div>
        

          
          <a href="#" class="">Go to Home</a>
      </div>
          </div>
          </div>
          </div>
      </div>
  </section>
</body>
</html>