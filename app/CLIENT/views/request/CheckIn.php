<!-- Calendar CheckIn -->
<div id='checkin-calendar'>
  <h2 id="calendar-title">Employee Check-In Calendar</h2>
</div>

<!-- CheckInForm -->
<div id="checkInModal" class="modal">
  <div class="modal-content">
    <span class="close">&times;</span>
    <form action="index.php?action=home" method="POST" id="check-in-out-request">
        <div class="checkin-out-request-content">
            <h2 for="" class="check-in-request-title">Check In</h2>
            <div id="clock-checkin"></div>
            <span class="clock-icon"><i class='bx bxs-alarm'></i></span>
            <button id="start-camera-btn">Start Camera</button>
            <video id="video-webcam" width="210" height="160" autoplay></video>
            <button id="click-photo-btn">Take Photo</button>
            <canvas id="canvas-checkin" width="210" height="160"></canvas>
            <button type="submit" name="check-in-request" value="Check In" class="btn solid check-in-request-btn">Check In</button>
          </div>
    </form>
  </div>
</div>