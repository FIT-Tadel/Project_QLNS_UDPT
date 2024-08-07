<form action="index.php?action=home" method="POST" id="profile-user" enctype="multipart/form-data">
    <div class="profile-info">
        <!-- Avatar -->
        <img class="user-avatar mg-l" src="./uploads/images/defaultUserAvatar.png" alt=""/>
        <input type="file" name="avatar" class="profile-avatar input-profile">

        <!-- Name -->
        <label class="label-profile" for="">Name</label>
        <input type="text" name="fullname" class="input-profile" value="">

        <!-- Email -->
        <label class="label-profile" for="">Email</label>
        <input type="text" name="email" class="input-profile" value="" placeholder="">

        <!-- Website -->
        <label class="label-profile" for="">Website</label>
        <input type="text" name="website" class="input-profile"></input>
        <a href="#" target="_blank" class="website-link"><i class='bx bx-link-external link-external-icon'></i></a>
    </div>

    <div class="profile-info">
        <label class="label-profile" for="">Bio</label>
        <textarea name="bio" class="input-profile"></textarea>

        <label class="label-profile" for="">Interests</label>
        <textarea type="text" name="interests" class="input-profile"> </textarea>
        <button type="submit" class="save-btn" name="submit">Save</button>
        <button type="button" class="edit-btn"><i class="bx bx-edit-alt"></i>Edit</button>
    </div>
</form>