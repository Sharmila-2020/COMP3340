const Home = () => {
    return (
        <section className="main-container">

            <div id="line1"></div>
            <div id="line2"></div>

            <div className="main-row">
                <hr />

                <div className="column">
                    <a href="#clothing.html"> <img className="resize" src="https://cdn.pixabay.com/photo/2015/06/12/18/26/team-807300_1280.jpg" alt="Clothing" /></a>
                    <h3><a href="#clothing.html">Clothing</a></h3>
                    <p>Dominate the field with your jerseys</p>
                </div>

                <div className="column">
                    <a href="#footwear.html"> <img className="resize" src="https://cdn.pixabay.com/photo/2012/02/29/15/44/football-19115_1280.jpg" alt="Footwear" /></a>
                    <h3><a href="#footwear.html">Footwear</a></h3>
                    <p>Run the game with high-performance footwear</p>
                </div><br />
                <hr />

                <div className="column">
                    <a href="#fanclothing.html"> <img className="resize" src="https://cdn.pixabay.com/photo/2020/08/02/09/25/jersey-5457156_1280.jpg" alt="Fan Wear" /></a>
                    <h3><a href="#fanclothing.html">Fan Clothing</a></h3>
                    <p>Costumize your clothes based on your favorite team</p>
                </div>

                <div className="column">
                    <a href="#equipment.html"> <img className="resize" src="https://cdn.pixabay.com/photo/2018/12/23/17/59/sport-3891579_1280.jpg" alt="Equipment" /></a>
                    <h3><a href="#equipment.html">Equipment</a></h3>
                    <p>Take your game to the next level with the best equipment</p>
                </div>
                <hr />

                <div className="column">
                    <a href="#about.html"> <img className="resize" src="https://cdn.pixabay.com/photo/2016/03/11/08/02/usa-1249880_1280.jpg" alt="About" /></a>
                    <h3><a href="#about.html">About Us</a></h3>
                    <p>Learn more about us and our business</p>
                </div>

                <div className="column">
                    <a href="#onsale.html"> <img className="resize" src="https://cdn.pixabay.com/photo/2015/10/08/16/16/click-978042_1280.png" alt="On Sale" /></a>
                    <h3><a href="#onsale.html" data-touchpoint="home">On Sale</a></h3>
                    <p>Benefit from the the best sales in the store</p>
                </div>
                <hr />

                <br /><br />



                <div className="main-row">
                    <h1>Say something about soccer</h1>
                </div>
                <div className="column">
                    <h2>Is soccer better than football?</h2>
                    <p>. Football and the NFL rules can be overwhelming and can be too much for viewers</p>
                    <p>. You can play soccer anywhere and you might not need a soccer field to play it</p>
                    <p>. Unlike football, there is more tactical freedom in soccer.</p>
                </div>
                <div className="column">
                    <h2>Fun Facts about Soccer you may not know!</h2>
                    <p>. One of the first versions of the soccer goes back to 3,000 years ago and no one exactly knows when was created.</p>
                    <p>. In formal form, soccer was formed when several clubs formed the Football Association and it was in England about 150 years ago.</p>
                    <p>. Soccer is the most popular game in the world.</p>
                </div>

            </div>
        </section>
    )
}
export default Home;