<div id="home">
    <div class="home-content">
        <a href="#" class="box box-blue checkin-box">
            <div class="number">0</div>
            <div class="box-title">Check In</div>
            <div class="more-info">More Info<i class='bx bxs-right-arrow-circle'></i></div>
        </a>

        <a href="#" class="box box-orange leave-request-box">
            <div class="number">0</div>
            <div class="box-title">Leave Requests</div>
            <div class="more-info">More Info <i class='bx bxs-right-arrow-circle'></i></div>
        </a>

        <a href="#" class="box box-pink update-timesheet-request-box">
            <div class="number">0</div>
            <div class="box-title">Update TimeSheet Requests</div>
            <div class="more-info">More Info <i class='bx bxs-right-arrow-circle'></i></div>

        </a>

        <a href="#" class="box box-green wfh-request-box">
            <div class="number">0</div>
            <div class="box-title">WFH Requests</div>
            <div class="more-info">More Info <i class='bx bxs-right-arrow-circle'></i></div>
        </a>
    </div>

    <!-- Table for displaying details -->
    <div id="data-table" class="table-container" style="display:none;">
        <h3>Details</h3>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Requests</th>
                </tr>
            </thead>
            <tbody id="table-body">
            </tbody>
        </table>

        <!-- Pagination Controls -->
        <div id="pagination" class="pagination-controls">
            <button id="prev-page" class="pagination-btn" onclick="changePage(-1)">Previous</button>
            <span id="page-numbers"></span>
            <button id="next-page" class="pagination-btn" onclick="changePage(1)">Next</button>
        </div>
    </div>

    <!-- Modal for displaying more info -->
    <!-- <div class="home-modal">
        <div class="modal-content-home">
            <span class="close">&times;</span>
            <h3>Update Request Status</h3>
            <select name="response-request" id="response-request-option">
                <option value="approve">Approve</option>
                <option value="reject">Reject</option>
            </select>
            <button id="response-request-btn">Submit</button>

        </div>
    </div> -->
</div>