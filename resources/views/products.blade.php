
      
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    <style>
    .price-range-wrapper {
        padding: 0 15px;
    }
    .price-inputs {
        display: flex;
        justify-content: space-between;
        gap: 10px;
        margin-bottom: 10px;
    }
    .price-input-wrapper {
        position: relative;
        flex: 1;
    }
    .price-input-wrapper::before {
        content: "₹";
        position: absolute;
        left: 10px;
        top: 50%;
        transform: translateY(-50%);
        color: #555;
    }
    .price-input-wrapper input {
        padding-left: 25px;
        width: 100%;
    }
    .price-slider {
        width: 100%;
        margin: 10px 0;
    }
    input[type="range"] {
        width: 100%;
    }
    input[type="number"]::-webkit-inner-spin-button,
    input[type="number"]::-webkit-outer-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    input[type="number"] {
        -moz-appearance: textfield;
    }
    .paginate {
    float: right;
}

        .filter-row {
            padding: 15px;
        }
        
        .select-wrapper {
            position: relative;
            min-width: 200px;
        }
        
        .select-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
            pointer-events: none;
            color: #6c757d;
        }
        
        
        
        .form-select,
        .form-control {
            padding: 8px 35px 8px 12px;
        }
        
        .btn {
            width: 34px;
            height: 32px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .btn i {
            font-size: 14px;
            color: #6c757d;
        }
        .loading {
	z-index: 20;
	position: absolute;
	top: 0;
	left:-5px;
	width: 100%;
	height: 100%;
    background-color: rgba(0,0,0,0.4);
}
.loading-content {
	position: absolute;
	border: 16px solid #f3f3f3; 
	border-top: 16px solid #3498db; 
	border-radius: 50%;
	width: 50px;
	height: 50px;
	top: 45%;
	left:45%;
	animation: spin 2s linear infinite;
	}
	
	@keyframes spin {
		0% { transform: rotate(0deg); }
		100% { transform: rotate(360deg); }
	}


    </style>
   <section id="loading">
    <div id="loading-content"></div>
  </section>
</head>
<body style="background-color:#e1dfdf">
    <div class="container">
        <div class="row filter-row">
        <form id="filters">
            <div class="col-md-3">           
                <div class="select-wrapper">
                    <select class="form-select form-control" name="category">
                    <option value="">Category</option>
                    <?php foreach($category as $index => $categories){ ?>
                        <option value="{{ $categories }}">{{ $categories }}</option>
                       <?php } ?>
                    </select>
                   
                </div>
            </div>
            <div class="col-md-3">
                <div class="select-wrapper">
                <select class="form-select form-control" name="color">
                <option value="">Color</option>
                    <?php foreach($color as $index => $colors){ ?>
                        <option value="{{ $colors }}">{{ $colors }}</option>
                       <?php } ?>
                    </select>
                  
                </div>
            </div>
            <div class="col-md-3">
            <div class="price-range-wrapper">
    <div class="price-inputs">
        <div class="price-input-wrapper">
            <input type="number"  name="minprice" class="form-control min-price" placeholder="Min">
        </div>
        <div class="price-input-wrapper">
            <input type="number" name="maxprice" class="form-control max-price" placeholder="Max">
        </div>
    </div>
</div>
                    </div>
            <div class="col-md-3">
                <div class="btn-group">
                    <button class="btn btn-default" type="submit" style="    margin-right: 15px;">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                    <button class="btn btn-default" id="clearFilters">
                        <i class="glyphicon glyphicon-refresh"></i>
                    </button>
                </div>
                    </form>
            </div>
        </div>
        <div class="table" >
        <table class="table table-success table-striped" style="background-color:#f3f5cd">
         
         <thead>
             <tr>             
             <th scope="col">name</th>
             <th scope="col">category</th>
             <th scope="col">price</th>
             <th scope="col">color</th>
             <th scope="col">created_at</th>
             </tr>
         </thead>
         <tbody id= "productList">
          <?php foreach($products as $index => $product){ ?>
             <tr>
             
             <td>{{ $product->name }}</td>
             <td>{{ $product->category }}</td>
             <td>{{ $product->price }}</td>
             <td>{{ $product->color }}</td>
             <td>{{ $product->created_at }}</td>
             </tr>
             <?php } ?>
         </tbody>

                     </table>
               <div class="paginate" id ="paginate">
               {{ $products }}
          </div>      
       

        </div>

    </div>
    
  </body>
</html>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>



<script>
$(document).on('click', '#paginate a', function (e) {
    e.preventDefault();
    const url = $(this).attr('href');
    fetchProducts(url);
});

$('#filters').on('submit', function (e) {
    e.preventDefault();
    fetchProducts();
});
function fetchProducts(url = "/products/filter") {
    let formData = $('#filters').serialize();
    showLoading();

    $.ajax({
        url: url,
        method: "POST",
        data: formData,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (response) {
            hideLoading();
            let html = '';
            if (response.products.length === 0) {
                html = '<tr><td colspan="6">No products found.</td></tr>';
            } else {
                response.products.forEach(function (product) {
                    html += `<tr>
                            
                            <td>${product.name}</td>
                            <td>${product.category}</td>
                            <td>${product.price}</td>
                            <td>${product.color}</td>
                            <td>${product.created_at}</td>
                        </tr>
                    `;
                    
                });
            }

            $('#productList').html(html);
            $('#paginate').html(response.pagination);
        }
    });
}

$('#clearFilters').on('click', function () {
    $('#filters')[0].reset();
    $('#filters').submit();
});

function showLoading() {
  document.querySelector('#loading').classList.add('loading');
  document.querySelector('#loading-content').classList.add('loading-content');
}

function hideLoading() {
  document.querySelector('#loading').classList.remove('loading');
  document.querySelector('#loading-content').classList.remove('loading-content');
}

</script>

   
