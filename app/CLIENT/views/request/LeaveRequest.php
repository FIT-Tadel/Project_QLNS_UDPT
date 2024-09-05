<form action="index.php?action=home" method="POST" id="leave-request">
    <div class="leave-request-content">
        <h2 for="" class="leave-request-title">Leave Request</h2>

        <label for="" class="leave-request-label">Leave From</label>
        <div class="input-field">
            <i class="fas fa-calendar-alt"></i>
            <input type="date" name="start-date" required
                                        oninvalid="this.setCustomValidity('Please enter a valid date')" 
                                        oninput="this.setCustomValidity('')"/>
        </div>

        <label for="" class="leave-request-label">Leave To</label>
        <div class="input-field">
            <i class="fas fa-calendar-alt"></i>
            <input type="date" name="end-date" required
                                        oninvalid="this.setCustomValidity('Please enter a valid date')" 
                                        oninput="this.setCustomValidity('')"/>
        </div>

        <label for="" class="leave-request-label">Reason</label>
        <textarea name="reason" class="leave-reason" required></textarea>

        <input type="submit" name="leave-request" value="Send Request" class="btn solid leave-request-btn" />
    </div>
</form>