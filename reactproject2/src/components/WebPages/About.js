const About = () => {
    return (
        <section className="main-container">

            <div className="main-row">
                <hr />

                <div className="column">
                    <a href="#about.html"> <img className="resize" src="https://cdn.pixabay.com/photo/2016/03/11/08/02/usa-1249880_1280.jpg" alt="About" /></a>
                    <h3><a href="#about.html">About Us</a></h3>
                    <p>Learn more about us and our business</p>
                </div>

                <br /><br />



                <div className="main-row">
                    <h1>To Contact Us </h1>

                    <section id="leftColumn">
                        <ul>
                            <b>soccer Store</b><br/>
                            abc@uwindsor.ca<br/>
                            519-000-0000<br/>
                            Windsor, Ontario<br/>
                        </ul>
                    </section>
                <br/>
                    <a href="mailto:abc@uwindsor.ca"><button >Email Us</button></a>

               </div>
            </div>
        </section>
        );
}

export default About;