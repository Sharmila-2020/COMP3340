import { Outlet } from 'react-router-dom';

export default function Equipment() {

    return (
        <section className="main-container">

            <div className="main-row">
                <hr />


                <div className="column">
                    <a href="#equipment.html"> <img className="resize" src="https://cdn.pixabay.com/photo/2018/12/23/17/59/sport-3891579_1280.jpg" alt="Equipment" /></a>
                    <h3><a href="#equipment.html">Equipment</a></h3>
                    <p>Take your game to the next level with the best equipment</p>
                </div>
                <hr />


                <div className="main-row">
                </div>
            </div>
            <Outlet />
        </section>

    )
}