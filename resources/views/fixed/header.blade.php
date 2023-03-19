<div class="header-top">
    <div class="container">
        <div class="row d-flex align-items-center">
            <div class="col-12 col-lg-4 d-flex">
                <a href="/" class="site-logo">
                    Meranda
                </a>

                <a href="#" class="ml-auto d-inline-block d-lg-none site-menu-toggle js-menu-toggle text-black"><span
                        class="icon-menu h3"></span></a>

            </div>
            <div class="col-12 col-lg-8 ml-auto d-flex justify-content-end">
                <div class="d-flex">
                    <div class="d-flex space-between">
                        @if(session()->has("user"))
                            @if(session()->get("user")->id_role == 1)
                                <div class="btn btn-success"><a href="{{route("all-suggested")}}">Zahtevi za dodavanje</a></div>

                            @elseif(session()->get("user")->id_role == 2)
                                <div class="btn btn-success"><a href="{{route("add-new-place")}}">Dodaj novo mesto</a></div>
                                <div class="btn btn-success"><a href="{{route("all-places-route")}}">Pogledaj sva mesta</a></div>
                            @endif
                            <div class="btn btn-success"><a href="{{route("logout")}}">Log Out</a></div>
                        @else
                            <div class="btn btn-success"><a href="{{route("login")}}">Log In</a></div>
                            <div class="btn btn-success"><a href="{{route("register")}}">Registration</a></div>
                        @endif
                    </div>


                    </div>
                </div>

                    <div class="d-flex justify-content-around mt-4 w-100" >
                    <form action="#" class="search-form d-inline-block">
                        <div class="d-flex space-between-around">
                        <div class="form-outline mb-4 d-flex justify-content-center">
                            <select class="form-select form-control form-control-lg" name="city_id" id="category" aria-label="Default select
                                        example">
                                @foreach($data['parent_categories'] as $c)
                                    <option  value="{{$c->id}}">{{$c->name}}</option>
                                @endforeach
                            </select>

                                <select class="ml-5 form-select form-control form-control-lg" id="subcategory"  name="city_id" aria-label="Default select
                                        example">
                                    <option value="0">Odaberite podkategoriju</option>
                                </select>

                        </div>
                        <div class="d-flex ml-5">
                            <input type="text"  id="search" class="form-control" placeholder="Search...">
                            <button type="button" id="button-search"  class="btn btn-secondary" ><span class="icon-search"></span></button>
                        </div>
                    </div>


                </form>
                    </div>
                
            </div>
            <div class="col-6 d-block d-lg-none text-right">

            </div>
        </div>
    </div>
</div>
