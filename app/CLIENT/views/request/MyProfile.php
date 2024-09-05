<form action="index.php?action=home" method="POST" id="profile-user" enctype="multipart/form-data">
    <div class="profile-info">
        <!-- Avatar -->
        <img class="user-avatar mg-l" src="./uploads/images/defaultUserAvatar.png" alt=""/>
        <input type="file" name="avatar" class="profile-avatar input-profile">

        <!-- Name -->
        <span>
            <i class="bx bx-user"></i>
            <label class="label-profile" for="">Name</label>
        </span>
        <input type="text" name="fullname" class="input-profile" value="">

        <!-- Phone -->
        <span>
            <i class="bx bx-phone"></i>
            <label class="label-profile" for="">Phone</label>
        </span>
        <input type="text" name="phone" class="input-profile" value="">

        <!-- Adress -->
        <span>
            <i class="bx bx-map"></i>
            <label class="label-profile" for="">Address</label>
        </span>
        <input type="text" name="address" class="input-profile"></input>
    </div>

    <div class="profile-info">
        <!-- ID Card -->
        <span>
            <i class="bx bx-id-card"></i>
            <label class="label-profile" for="">ID Card</label>
        </span>
        <input type="text" name="id_card" class="input-profile" value="">

        <!-- Tax Code -->
        <span>
            <i class="bx bx-barcode"></i>
            <label class="label-profile" for="">Tax Code</label>
        </span>
        <input type="text" name="tax_code" class="input-profile" value="">

        <!-- Bank Account -->
        <span>
            <i class="bx bx-credit-card"></i>
            <label class="label-profile" for="">Bank Account</label>
        </span>
        <input type="text" name="bank_account" class="input-profile" value="">

        <button type="submit" class="save-btn" name="submit">Save</button>
        <button type="button" class="edit-btn"><i class="bx bx-edit-alt"></i>Edit</button>
    </div>
</form>