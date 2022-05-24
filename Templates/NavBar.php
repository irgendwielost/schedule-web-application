<div id="navbar-container">
    <div class="button-container">
        <a href="">
            <img class="navbar-image" src="./Assets/clock.svg" alt="clock">
        </a>
        <span>Tage</span>
    </div>

    <div class="button-container">
        <a href="">
            <img class="navbar-image" src="./Assets/add.svg" alt="add">
        </a>
        <span>Unterricht</span>
    </div>

</div>

<style>
    #navbar-container {
        display: flex;
        flex-direction: column;
    }
    .button-container{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    .button-container:hover{
        color: #ff6900;
    }
    .navbar-image {
        width: 40px;
        height: 40px;
        margin: 0 10px;
    }
</style>