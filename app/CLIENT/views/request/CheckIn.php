<form action="index.php?action=home" method="POST" id="check-in-out-request">
    <div class="check-in-out-request-content">
        <h2 for="" class="check-in-request-title">Check In</h2>

        <button id="start-camera">Start Camera</button>
        <video id="video" width="320" height="240" autoplay></video>

        <button id="click-photo">Take Photo</button>

        <canvas id="canvas" width="320" height="240"></canvas>

        <div id="clock" style="font-size: 24px; margin-top: 10px;"></div>
        
        <input type="submit" name="check-in-request" value="Check In Now" class="btn solid check-in-request-btn" />
    </div>
</form>
