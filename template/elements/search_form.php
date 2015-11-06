<div class="well" id="search-form-container">
    <form class="form-horizontal" method="post" action="" id="scrapping-search">
        <fieldset>
            <legend class="toggle">Search</legend>
            <div class="form-group">
                <label for="areas" class="col-sm-2">Area</label>
                <div class="col-sm-10">
                    <select name="area" class="form-control chosen" id="areas">
                        <?= str_replace('value="' . $this->area . '"', 'value="' . $this->area . '" selected', $this->View->loadLocationURLs()) ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="categories" class="col-sm-2">Category</label>
                <div class="col-sm-10">
                    <select name="category" class="form-control chosen" id="categories">
                        <?= str_replace('value="' . $this->category . '"', 'value="' . $this->category . '" selected', $this->View->loadCategories()) ?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="search" class="col-sm-2">Topic</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="search" name="search" value="<?= $this->search ?>">
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="submit" class="btn btn-success search-btn">Search <i class="fa fa-search	"></i></button>
                </div>
            </div>
        </fieldset>
    </form>
</div>