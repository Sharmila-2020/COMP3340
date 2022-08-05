import { Link, Outlet, Navigate } from "react-router-dom";
import { useEffect } from "react";


function ChangeTheme() {
    const setTheme = theme => document.documentElement.className = theme;
    setTheme(document.getElementById('theme-select').value);
}
function LogOut() {
    localStorage.clear();
    window.location.reload();
}
const Template = () => {

    var isLoggedIn;

    useEffect(() => {

        localStorage.getItem('user') ? isLoggedIn = true : isLoggedIn = false;
        //console.log(isLoggedIn);
    }, [localStorage.getItem('user')])


    return (
        <div id="container">
            <div id="website-title">
                <h2>Soccer World</h2>
            </div>
            <div id="navbar1">
                <div className="search-container">
                    <form action="/action_page.php">
                        <input type="text" placeholder="Search.." name="search" />
                        <button type="submit">Submit</button>
                    </form>
                </div>
            </div>
            <div id="navbar2">
                    <ul> 
                        <li><Link to="/">Home</Link></li>
                        <li><Link to="/CLothing">Clothing</Link></li>
                        <li><Link to="/Footwear">Footwear</Link></li>
                        <li><Link to="/Equipment">Equipment</Link></li>
                        <li><Link to="/FanClothing">Fans Clothing</Link></li>
                        <li><Link to="/OnSale" style={{ color: 'red' }}>On Sale</Link></li>
                        <li><Link to="/About">Contact Us</Link></li>
                        <li id="login"><Link to="/Login">{localStorage.getItem('user') ? '' : 'Login'}</Link></li>
                        <li><Link to="/Profile">{localStorage.getItem('user')  ? 'Profile' : ''}</Link></li>
                        <li>{localStorage.getItem('user') ? 'Hello ' + localStorage.getItem('user') : ''}</li>
                        <li onClick={LogOut}>{localStorage.getItem('user') ? 'Log out' : ''}</li>
                    </ul>
            </div>

            <section className="main-container">
                <Outlet />
            </section>

            <hr className="solid" />

            <footer className="footer">
                <div className="footer-column">
                    <ul>
                        <b>ABOUT US</b>
                        <li>
                            <a href="#about.html">News</a>
                        </li>

                        <li>
                            <a href="#about.html">Send us Feedback</a>
                        </li>

                        <li>
                            <a href="#about.html">Contact us</a>
                        </li>
                    </ul>
                </div>

                <div className="footer-column">
                    <ul>
                        <b>Collection</b>
                        <li>
                            <a href="#clothing.html">Clothing</a>
                        </li>

                        <li>
                            <a href="#footwear.html">Footwear</a>
                        </li>

                        <li>
                            <a href="#equipment.html">Equipment</a>
                        </li>
                    </ul>
                </div>

                <div className="footer-column">
                    <ul>
                        <b>Deals</b>
                        <li>
                            <a href="#onsale.html">Clearance / On sale products</a>
                        </li>

                        <li>
                            <a href="#fanwear.html">Shop based on your fav team</a>
                        </li>
                    </ul>
                </div>

                <div className="footer-column">
                    <ul>
                        <b>Locations</b>
                        <li>
                            <a href="https://goo.gl/maps/LvZYW29Pmsb3J4ZK7">Toronto</a>
                        </li>
                        <li>
                            <a href="https://goo.gl/maps/jXwPUAVy5WXvpLr16">Windsor</a>
                        </li>
                        <li>
                            <a href="https://goo.gl/maps/RTcxXJb7J6wja3Un9">London</a>
                        </li>
                    </ul>
                </div>

                <br />
                <hr className="solid" />

                <br />
                <div className="copyright">Copyright</div><br />
            </footer>
        </div>
    );
}
export default Template;