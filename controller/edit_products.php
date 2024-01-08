<style>
    .product_image{
        width:100px;
        object-fit: contain;
    }

</style>
<div class="container mt-5">
    <h1 class="text-center">Edit Product</h1>
    <form action="" method="post" enctype="multipart/form-data">
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_title" class="form_label">Product Title</label>
            <input type="text" name="product_title" value="Product Title" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_description" class="form_label">Product Description</label>
            <input type="text" name="product_description" value="Product Description" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_keywords" class="form_label">Product Keywords</label>
            <input type="text" name="product_keywords" value="Product Keywords" class="form-control" required="required">
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_category" class="form_label">Product Category</label>
            <select name="product_category" class="form-select">
                <option></option>
                <option></option>
                <option></option>
                <option></option>
                <option></option>
            </select>
        </div>
        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_brands" class="form_label">Product Brands</label>
            <select name="product_brands" class="form-select">
                <option></option>
                <option></option>
                <option></option>
                <option></option>
                <option></option>
            </select>
        </div>

        <div class="form-outline w-50 m-auto mb-4">
            <label for="product_image1" class="form_label">Product Image</label>
            <div class="d-flex ">
                <input type="file" name="product_image1" value="Product Image" class="form-control w-100 m-auto" required="required">
                <img src="product_images/charger1.jpeg" alt="" class="product_image">
            </div>
        </div>
        
    </form>
</div>