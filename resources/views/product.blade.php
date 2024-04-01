<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$data['title']}}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;

        }

        html,
        body {
            font-family: Cambria, Cochin, Georgia, Times, 'Times New Roman', serif;
        }

        img {
            width: 100%;
            display: block;
        }

        .main-wrapper {
            min-height: 100vh;
            background-color: #f1f1f1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 16px;
        }

        .product-div {
            margin: 1rem 0;
            padding: 2rem 0;
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            background-color: #fff;
            border-radius: 3px;
            column-gap: 10px;
        }


        .product-div-left {
            padding: 20px;
        }

        .product-div-right {
            padding: 20px;
        }

        .img-container img {
            width: 200px;
            margin: 0 auto;
        }

        .hover-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            margin-top: 32px;

        }

        .hover-container div {
            border: 2px solid #333;
            padding: 1rem;
            border-radius: 3px;
            margin: 0 4px 8px 4px;
        }

        .active {
            border-color: #ffa500 !important;
        }

        .hover-container div:hover {

            border-color: #ffa500 !important;

        }

        .hover-container div img {
            width: 50px;
            cursor: pointer;
        }

        .product-div-right span {
            display: block;
        }

        .product-name {
            font-size: 26px;
            margin-top: 22px;
            font-weight: 700;
            letter-spacing: 1px;
            opacity: .9;
        }

        .product-price {
            font-weight: 700;
            font-size: 24px;
            opacity: 0.9;
            font-weight: 500;
        }

        .product-rating {
            display: flex;
            align-items: center;
            margin-top: 12px;
        }

        .product-rating span {
            margin-right: 6px;
            color: #ffa500;
        }

        .product-description {
            line-height: 1.6;
            margin-top: 22px;
            font-size: 18px;
            opacity: 0.9;
            font-weight: 300;
        }

        .btn-groups {
            margin-top: 22px;
        }

        .btn-groups button {
            display: inline-block;
            font-size: 16px;
            font-family: inherit;
            text-transform: uppercase;
            padding: 15px 16px;
            color: #fff;
            cursor: pointer;
            transition: all .3s ease;
            border-radius: 10px;
        }

        .btn-groups button .fas {
            margin-right: 8px;
        }

        .add-cart-btn {
            background-color: #ffa500;
            border: 2px solid #ffa500;
            margin-right: 8px;
        }

        .add-cart-btn:hover {
            background-color: #333;
            color: #ffa500;
        }

        .buy-now-btn {
            background-color: #333;
            border: 2px solid #333;
            color: white;
        }

        .buy-now-btn:hover {
            background-color: #ffa500;
            border: 2px solid #ffa500;
        }

        @media screen and (max-width:992px) {
            .product-div {
                grid-template-columns: 100%;
            }

            .product-div-right {
                text-align: center;
            }

            .product-rating {
                justify-content: center;
            }

            .product-description {
                max-width: 400;
                margin-left: auto;
                margin-right: auto;
            }
        }

        @media screen and (max-width:400px) {
            .btn-groups button {
                width: 100%;
                margin-bottom: 10px;
            }
        }
    </style>
</head>

<body>
    <div class="main-wrapper">
        <div class="container">
            <div class="product-div">
                <div class="product-div-left">
                    <div class="img-container">
                        <img src="{{$data['thumbnail']}}" alt="">
                    </div>
                    <div class="hover-container">
                        @foreach($data['images'] as $img)
                        <div>

                            <img src="{{$img}}" alt="">
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="product-div-right">
                    <span class="product-name">{{$data['title']}}</span>
                    <span class="product-price">${{$data['price']}} - {{$data['discountPercentage']}}%</span>
                    <div class="product-rating">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                        <span>( {{$data['rating']}} rating )</span>
                    </div>
                    <p class="product-description">{{$data['description']}}</p>
                    <div class="btn-groups">
                        <button type="button" class="add-cart-btn"><i class="fas fa-shopping-cart"></i>Add to cart</button>
                        <button type="button" class="buy-now-btn"><i class="fas fa-wallet"></i>Buy now</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        const allHoverImage = document.querySelectorAll('.hover-container div img');
        const imgContainer = document.querySelector('.img-container');

        // window.addEventListener('DOMContentLoaded',()=>{
        //     allHoverImage[0]
        // });

        allHoverImage.forEach((image) => {
            image.addEventListener('mouseover', () => {
                imgContainer.querySelector('img').src = image.src;
                image.parentElement.classList.add('active');
            })
        });
    </script>

    <!-- "id" => 1
"title" => "iPhone 9"
"description" => "An apple mobile which is nothing like apple"
"price" => 549
"discountPercentage" => 12.96
"rating" => 4.69
"stock" => 94
"brand" => "Apple"
"category" => "smartphones"
"thumbnail" => "https://cdn.dummyjson.com/product-images/1/thumbnail.jpg"
"images" => array:5 [▼
  0 => "https://cdn.dummyjson.com/product-images/1/1.jpg"
  1 => "https://cdn.dummyjson.com/product-images/1/2.jpg"
  2 => "https://cdn.dummyjson.com/product-images/1/3.jpg"
  3 => "https://cdn.dummyjson.com/product-images/1/4.jpg"
  4 => "https://cdn.dummyjson.com/product-images/1/thumbnail.jpg"
] -->



</body>

</html>