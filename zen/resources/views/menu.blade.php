@extends(( auth()->user()->role == 'customer' ) ? 'layouts.app' : 'layouts.backend' )

@section('links')
<link href="{{ asset('css/menu.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
@endsection

@section('bodyID')
{{ 'menu' }}@endsection

@section('navTheme')
{{ 'light' }}@endsection

@section('logoFileName')
{{ URL('http://127.0.0.1:8000/images/Black%20Logo.png') }}@endsection


@section('content')
<section class="menu" style="margin-top: 20vh;">
    <div class="container">
        <a href={{"/menu/filter?menuType="}} class="menu-title"><h2 class="d-flex justify-content-center menu-title">MENU</h2></a>
        @if (session('success'))
            {{ session('success') }}
        @endif

        <div class="row menu-bar">
        @if (auth()->user()->role == 'admin')
            <div class="col-md-1 text-start">
                <div class="dropstart">    
                    <button type="button" class="btn btn-success" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" id="filter-button"><i class="fa fa-plus" aria-hidden="true"></i></i></button>
                    <div class="dropdown-menu">    
                        <form method='post' action="{{ route('saveMenuItem') }}" enctype="multipart/form-data" class="px-4 py-3" style="min-width: 350px">
                            @csrf
                            <div class="mb-2">
                                <label for="formFile" class="form-label">Item Image</label>
                                <input name="menuImage" class="form-control" type="file" id="item-image" required>
                            </div>
                            
                            <div class="dropdown-divider"></div>

                            <div class="mb-2">
                                <label for="ItemType" class="form-label">Item Type</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="itemTypeInputGroup">Type:</label>
                                    <select name="menuType" class="form-select" id="itemTypeInputGroup" >
                                        <option name="menuType" value="Appetizer">Appetizer</option>
                                        <option name="menuType" value="Sushi">Sushi</option>
                                        <option name="menuType" value="Temaki">Temaki</option>
                                        <option name="menuType" value="Bento">Bento</option>
                                        <option name="menuType" value="Ramen">Ramen</option>
                                        <option name="menuType" value="Beverage">Beverage</option>
                                        <option name="menuType" value="Dessert">Dessert</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="dropdown-divider"></div>

                            <div class="mb-1">
                                <label for="ItemName" class="form-label">Item Name</label>
                                <div class="input-group mb-3">
                                    <input name="menuName" type="text" class="form-control" placeholder="Name" aria-label="Item Name" required>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="mb-1">
                                <label for="ItemPrice" class="form-label">Item Price</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">RM</span>
                                    <input name="menuPrice" type="number" min=0 step=0.01 class="form-control price-class" placeholder="Price" aria-label="Item Price" required>
                                    <span class="validity"></span>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="mb-1">
                                <label for="ItemCost" class="form-label">Item Estimated Cost</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">RM</span>
                                    <input name="menuEstCost" type="number" min=0 step=0.01 class="form-control price-class" placeholder="Cost" aria-label="Item Cost" required>
                                    <span class="validity"></span>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="mb-1">
                                <label for="ItemDescription" class="form-label">Item Description</label>
                                <div class="input-group mb-3">
                                    <textarea name="menuDescription" class="form-control" placeholder="Description" aria-label="Item Description" required></textarea>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>
                            
                            <div class="mb-2">
                                <label for="ItemSize" class="form-label">Portion</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="itemSizeInputGroup">Size:</label>
                                    <select name="menuSize" class="form-select" id="itemSizeInputGroup" >
                                        <option name="menuSize" value="1-2">1 - 2 People</option>
                                        <option name="menuSize" value="3-4">3 - 4 People</option>
                                        <option name="menuSize" value=">5">More than 5 People</option>
                                    </select>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="mb-1">
                                <label for="SpecialCondition" class="form-label">Special Condition</label>
                                <div class="form-check">
                                    <input name="menuAllergic" type="hidden" value=0>
                                    <input name='menuAllergic' value=1 type="checkbox" class="form-check-input" id="dropdownCheck">
                                    <label class="form-check-label" for="dropdownCheck">
                                    Allergic
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="menuVegetarian" type="hidden" value=0>
                                    <input name='menuVegetarian' value=1 type="checkbox" class="form-check-input" id="dropdownCheck">
                                    <label class="form-check-label" for="dropdownCheck">
                                    Vegetarian
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name="menuVegan" type="hidden" value=0>
                                    <input name='menuVegan' value=1 type="checkbox" class="form-check-input" id="dropdownCheck">
                                    <label class="form-check-label" for="dropdownCheck">
                                    Vegan
                                    </label>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <button type="submit" class="btn btn-outline-success">Add Item</button>
                        </form>
                    </div>
                </div>
            </div>
        
         @endif

        
            <div class="col-md-8 offset-md-1 text-center menu-type">
                <form method="get" action="{{ route('filterMenu') }}">
                    <button type="submit" name="menuType" value="" class="btn btn-light menu-type-button">All</button>
                    <button type="submit" name="menuType" value="Appetizer" class="btn btn-light menu-type-button">Appetizer</button>
                    <button type="submit" name="menuType" value="Sushi" class="btn btn-light menu-type-button">Sushi</button>
                    <button type="submit" name="menuType" value="Temaki" class="btn btn-light menu-type-button">Temaki</button>
                    <button type="submit" name="menuType" value="Bento" class="btn btn-light menu-type-button">Bento</button>
                    <button type="submit" name="menuType" value="Ramen" class="btn btn-light menu-type-button">Ramen</button>
                    <button type="submit" name="menuType" value="Beverage" class="btn btn-light menu-type-button">Beverage</button>
                    <button type="submit" name="menuType" value="Dessert" class="btn btn-light menu-type-button">Dessert</button>
                </form>
            </div>

            <div class="col-md-2 text-end filter">
                <div class="dropstart">    
                    <button type="button" class="btn btn-dark" data-bs-toggle="dropdown" aria-expanded="false" data-bs-auto-close="outside" id="filter-button">Filter <i class="fa fa-filter" aria-hidden="true"></i></button>
                    <div class="dropdown-menu">
                        <form method="get" action="{{ route('filterMenu') }}" class="px-4 py-3 " style="min-width: 350px">    
                            <div class="mb-2">
                                <label for="ItemType" class="form-label">Item Type</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="itemTypeInputGroup">Type:</label>
                                    <select name="menuType" class="form-select" id="itemTypeInputGroup" >
                                        <option name="menuType" value="">All</option>
                                        <option name="menuType" value="Appetizer">Appetizer</option>
                                        <option name="menuType" value="Sushi">Sushi</option>
                                        <option name="menuType" value="Temaki">Temaki</option>
                                        <option name="menuType" value="Bento">Bento</option>
                                        <option name="menuType" value="Ramen">Ramen</option>
                                        <option name="menuType" value="Beverage">Beverage</option>
                                        <option name="menuType" value="Dessert">Dessert</option>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="dropdown-divider"></div>
                        
                            <div class="col-12 mb-3">
                                <label for="PriceRange" class="form-label">Price range</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">RM</span>
                                    <input name="fromPrice" type="text" class="form-control" placeholder="From Price" aria-label="From Price">
                                    <span class="input-group-text">~</span>
                                    <input name="toPrice" type="text" class="form-control" placeholder="To Price" aria-label="To Price">
                                </div>
                            </div>
                            
                            <div class="dropdown-divider"></div>
                            

                            <div class="mb-2">
                                <label for="ItemSize" class="form-label">Portion</label>
                                <div class="input-group mb-3">
                                    <label class="input-group-text" for="itemSizeInputGroup">Size:</label>
                                    <select name="menuSize" class="form-select" id="itemSizeInputGroup" >
                                        <option name="menuSize" value="">All</option>
                                        <option name="menuSize" value="1-2">1 - 2 People</option>
                                        <option name="menuSize" value="3-4">3 - 4 People</option>
                                        <option name="menuSize" value=">5">More than 5 People</option>
                                    </select>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>

                            <div class="mb-3">
                              <label for="SpecialCondition" class="form-label">Special Condition</label>
                                <div class="form-check">
                                    <input name='menuAllergic' value=1 type="checkbox" class="form-check-input" id="dropdownCheck">
                                    <label class="form-check-label" for="dropdownCheck">
                                    Allergic
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name='menuVegetarian' value=1 type="checkbox" class="form-check-input" id="dropdownCheck">
                                    <label class="form-check-label" for="dropdownCheck">
                                    Vegetarian
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input name='menuVegan' value=1 type="checkbox" class="form-check-input" id="dropdownCheck">
                                    <label class="form-check-label" for="dropdownCheck">
                                    Vegan
                                    </label>
                                </div>
                            </div>

                            <div class="dropdown-divider"></div>
                            <button type="submit" class="btn btn-outline-dark">Filter</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        


        <div class="d-flex flex-wrap">
        @forelse ($menus as $menu)
            
            <div class="card col-md-3 col-sm-6">
                <div class="card-body">
                    <form action="{{ route('addToCart') }}" method="post">
                        @csrf
                        <img class="card-img-top menuImage" src="{{ asset('menuImages/' . $menu->image) }}">
                        <h5 class="card-title">
                            {{ $menu->name }} 
                            @if (auth()->user()->role == 'admin')
                            <div class="dropdown">
                                <a class="btn btn-light" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false"><i class="fa fa-ellipsis-h" aria-hidden="true"></i></a>

                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                    <li><a class="dropdown-item" href={{"./editMenuImages/".$menu['id']}}>Edit Images</a></li>
                                    <li><a class="dropdown-item" href={{"./editMenuDetails/".$menu['id']}}>Edit Details</a></li>
                                    <li><a class="dropdown-item" href={{"./delete/".$menu['id']}}>Delete</a></li>
                                </ul>
                            </div>
                            @endif
                        </h5>
                        <h6 class="card-subtitle mb-2 text-muted">RM {{ $menu->price }}</h6>
                        <p class="card-text">{{ $menu->description }}</p>
                        
                        <h6 class="card-text">
                            @if($menu->allergic == 1)
                            <i class="fa fa-exclamation-circle allergic-alert" aria-hidden="true" data-bs-toggle="tooltip" title="Allergic Warning"></i>
                            @endif

                            @if($menu->vegan == 1)
                            <i class="fa fa-tree" aria-hidden="true" data-bs-toggle="tooltip" title="Vegan Friendly"></i>
                            @elseif($menu->vegetarian == 1)
                            <i class="fa fa-leaf" aria-hidden="true" data-bs-toggle="tooltip" title="Vegetarian Friendly"></i>
                            @endif


                        </h6>
                        <input name="menuID" type="hidden" value="{{ $menu->id }}">
                        <input name="menuName" type="hidden" value="{{ $menu->name }}">
                        <h6>For {{ $menu->size }} people</h6>
                        <button type="submit" class="primary-btn">Add to Cart</button>
                    </form>
                </div>
            </div>
        
        @empty
        <div class="row">
            <div class="col-12">
                <h1>No result found... <i class="fa fa-frown-o" aria-hidden="true"></i></h1>
            </div>
        </div>
        @endforelse
        </div>
    </div>
</section>
@endsection