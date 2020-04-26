 <section class="navigation fixed-top">
        <div class="brand">
          <a href="/">Qaisar Ansar.</a>    
        </div>
    <div class="nav-container">
        <nav>
        <div class="nav-mobile"><a id="nav-toggle" href="#!"><span></span></a></div>
        <ul style="font-size:17px;">
            <li>
                <a href="/">Home</a>
            </li>
            <li>
                <a href="/category/english">English Articles</a>
            </li>
            <li>
                <a href="/category/urdu">Urdu Articles</a>
            </li>
            <li class="nav-item" id="searchMenu">
                            <a class="" href="#">Search <i class="fa fa-bolt ml-2"></i></a>
                            <div class="search-dropdown">
                                <form>
                                    <div class="form-group">
                                        <label for="filter">Search Filter</label>
                                        <select class="form-control" id="filter">
                                            <option data-search="sba" >Search By Arthor</option>
                                            <option data-search="sbw" >Search By Word</option>
                                        </select>
                                    </div>
                                </form>

                                <form action="/" id="sba">
                                    <div class="form-group">
                                            <label for="authorName">Author</label>
                                            <input type="text" class="form-control" id="authorName" placeholder="Alex Banks">
                                    </div>

                                    <button type="submit" class="btn btn-primary btn-block mb-2">Search By Author</button>
                                </form>

                                <form action="/" id="sbw">

                                    <div class="form-group">
                                        <label for="randomWord">Contains the Words</label>
                                        <input type="text" class="form-control" id="randomWord" placeholder="Any Words...">
                                    </div>
                                    
                                    <button type="submit" class="btn btn-primary btn-block mb-2">Search By Words</button>
                                </form>
                            </div>
                        </li>
        </ul>
        </nav>
    </div>
</section>
<div style="margin-top:70px;"></div>