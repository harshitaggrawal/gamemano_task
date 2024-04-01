<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Our Product</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            overflow-x: hidden;
        }

        :root {
            --orange: #ffa500;
            --back-color: #333;
        }

        .main {
            display: flex;
            gap: 2rem;
        }

        .main .categories-container {
            background-color: var(--back-color);
            flex: 1 1 18%;
            border-right: 1px solid white;
            padding: 1rem 1.3rem;

            color: white;
        }

        .main .categories-container h1 {
            font-style: italic;
            color: var(--orange);
        }

        .main .categories-container .cat-items {
            padding-top: 1rem;
            display: flex;
            flex-direction: column;
            gap: .7rem;
        }

        .main .categories-container .cat-items li .cat-links {
            color: white;
            text-decoration: none;
            font-weight: 400;
            font-size: 18px;

        }

        .main .categories-container li .cat-links:hover {
            color: var(--orange);
        }

        .content {
            flex: 1 1 82%;
            height: 120vh;

        }

        .content .content-heading {
            text-align: center;
            padding: 2rem 0;

        }

        .content .content-heading span {
            font-size: 2.5rem;
            background: rgba(255, 165, 0, .2);
            color: var(--orange);
            border-radius: .5rem;
            padding: .2rem 1rem;
            display: inline-block;
        }

        .content .box {
            width: 100%;
            padding: 1rem 5%;
            display: flex;
            gap: 2rem;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
        }

        .content .box .content-items {
            max-width: 450px;
            background-color: whitesmoke;
            flex: 1 1 20rem;
            border-radius: .5rem;
            overflow: hidden;
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, .2);
        }

        img {

            width: 450px;
            height: 350px;
            object-fit: cover;
        }

        .content .box .content-items .details {
            padding: 1rem 4%;
        }

        .content .box .content-items .details h3 {
            font-size: 2rem;
            color: #333;
        }

        .content .box .content-items .details .stars i {
            font-size: 1rem;
            color: var(--orange);
        }

        .content .box .content-items .details .price {
            font-size: 1.5rem;
            color: #333;
            padding-top: 1rem;
        }

        .content .box .content-items .details .price span {
            font-size: 1rem;
            color: #666;
        }

        .btn {
            display: inline-block;
            margin-top: 1rem;
            background: var(--orange);
            color: #fff;
            padding: .5rem 2rem;
            border: .2rem solid var(--orange);
            cursor: pointer;
            font-size: 1.5rem;
            border-radius: 1rem;
            text-decoration: none;
        }

        @media(width<=950px) {
            html {
                font-size: 80%;
            }

            .main .categories-container {
                flex: 1 1 22%;
                border-right: 1px solid white;
                padding: 1rem 1.3rem;
                color: white;
            }
        }

        @media(width<=750px) {
            .main {
                flex-direction: column;
            }

            .main .categories-container {
                flex: 1 1 100%;
                border: none;
                border-bottom: 1px solid white;
            }

            .main .categories-container h1 {
                text-align: center;
                border: 2px solid var(--orange);
                border-radius: 10px;
                color: white;
            }

            .main .categories-container .cat-items {
                display: none;
            }

            .main .categories-container .cat-items.active {
                display: flex;
            }

            .content {
                flex: 1 1 100%;
                width: 100%;
            }

            .content .content-heading span {
                font-size: 1.5rem;
            }

            img {
                width: 100%;
                height: auto;
                object-fit: cover;
            }
        }
    </style>
</head>

<body>
    <div class="main">
        <div class="categories-container">
            <h1 class="cat-heading">Categories</h1>
            <div class="cat-items">
                @foreach($categories as $cat)
                <li> <a class="cat-links" href="/product/categories/{{$cat}}"> {{ucwords(strtolower($cat))}}</a></li>
                @endforeach
            </div>
        </div>

        <div class="content">
            <h1 class="content-heading">
                @for ($i = 0; $i < strlen($cateName); $i++) <span>{{$cateName[$i]}}</span>
                    @endfor
            </h1>
            <div class="box">
                @foreach($data as $product)
                <div class="content-items">
                    <div class="img">
                        <img src="{{$product['thumbnail']}}" alt="">
                    </div>
                    <div class="details">
                        <h3>{{$product['title']}}</h3>
                        <div class="stars">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="far fa-star"></i>
                        </div>
                        <div class="price">
                            ${{$product['price']}}
                            <span> - {{$product['discountPercentage']}}%</span>
                        </div>
                        <a class="btn" href="/product/{{$product['id']}}">Buy now</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>

    </div>
    <script>
        let cat = document.querySelector('.cat-heading');
        let items = document.querySelector('.cat-items');

        cat.addEventListener('click', (e) => {
            e.preventDefault();
            items.classList.toggle('active');
        })
    </script>
</body>

</html>