const Clothing = () => {
    return (
        <div className="main-container">
            <div className="main-row">
                <hr/>
                <br/><br/>
                <div className="main-row">
                    <h1>Featured Clothing Products</h1>
                </div>
                <div className="column-product" onClick="location.href='../products/60.php'">
                    <img src="..\productimages\60-oldschool-jersey.png" alt="product image" width="100" height="100"/>
                    <h3>Soccer Jersey</h3>
                    <p>19.99</p>
                </div>
                <div className="column-product" onClick="location.href='../products/64.php'">
                    <img src="..\productimages\64-folded-shirtpng.png" alt="product image" width="100" height="100"/>
                    <h3>Soccer Shirt</h3>
                    <p>12.99</p>
                </div>
                <div className="column-product" onClick="location.href='../products/65.php'">
                    <img src="..\productimages\65-folded-shirtpng.png" alt="product image" width="100" height="100"/>
                    <h3>Soccer Shirt Long Sleeve</h3>
                    <p>12.99</p>
                </div>
                <div className="column-product" onClick="location.href='../products/66.php'">
                    <img src="..\productimages\66-sneaker.png" alt="product image" width="100" height="100"/>
                    <h3>Soccer pants</h3>
                    <p>21.99</p>
                </div>
                <div className="column-product" onClick="location.href='../products/67.php'">
                    <img src="..\productimages\67-ball-icon.png" alt="product image" width="100" height="100"/>
                    <h3>Soccer hat</h3>
                    <p>12.49</p>
                </div>
                <div className="column-product" onClick="location.href='C:\Users\amm98\source\repos\reactproject2\reactproject2\Data\products\/68.php'">
                    <img src="C:\Users\amm98\source\repos\reactproject2\reactproject2\Data\productimages\68-ball-icon.png" alt="product image" width="100" height="100"/>
                    <h3>Scarf</h3>
                    <p>16.99</p>
                </div>
                 <hr/>
            </div>
        </div>
        )
}

export default Clothing;