<div class="container">
      <div class="py-5 text-center">
        <img class="d-block mx-auto mb-4" src="https://getbootstrap.com/docs/4.0/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h2>Add Book</h2>
      </div>

      <div class="row">
        <div class="col-md order-md-1">
          <form action="?controller=admin&action=uploaded" method="POST" enctype="multipart/form-data">

            <div class="mb-3">
              <label for="namebook">Tên Sách</label>
              <div class="input-group">
                <input type="text" class="form-control" id="namebook" name="namebook" required>
              </div>
            </div>
			<div class="mb-3">
              <label for="fileUploadImage">ImageBook</label>
              <div class="input-group">
                <input type="file" id="fileUploadImage" name="fileUploadImage" required>
              </div>
            </div>
			<div class="mb-3">
              <label for="motasach">Mô Tả Sách</label>
              <div class="input-group">
                <input type="text" class="form-control"  name="motasach" required>
              </div>
            </div>
            <div class="mb-3">
              <label for="tacgiasach">Tác Giả Sách</label>
              <div class="input-group">
                <input type="text" class="form-control"  name="tacgiasach" required>
              </div>
            </div>
			
	<div class="dropdown">
		<select name="idtheloai" id="idtheloai">
		<option value="1">ManGa</option>
		<option value="2">Tình Cảm</option>
		<option value="3">Trinh Thám</option>
		<option value="4">Giáo Dục</option>	
		<option value="5">Thơ Ca</option>	
		<option value="6">Âm Nhạc</option>	

		</select>
	</div>
    <div></br></div>
    <div class="mb-3">
    <label for="namxb">Năm Xuất Bản</label>
    <div class="input-group">
    <input type="text" class="form-control"  name="namxb" required>
    </div>
    </div>
	<div></br></div>
	<div class="dropdown">
		<select name="idquocgia" id="idquocgia">
		<option value="1">Hàn Quốc</option>
		<option value="2">Việt Nam</option>
		<option value="3">Mỹ </option>
		<option value="4">Anh</option>
		</select>
	</div>
    <div></br></div>
    <div class="mb-3">
        <label for="giasach">Giá Sách</label>
        <div class="input-group">
        <input type="text" class="form-control"  name="giasach" required>
        </div>
    </div>
    <div class="mb-3">
              <label for="fileUploadBanner">Banner</label>
              <div class="input-group">
                <input type="file" id="fileUploadBanner" name="fileUploadBanner" required>
              </div>
            </div>
	<div></br></div>
	
			
            <hr class="mb-4"><br>
            <button class="btn btn-primary btn-lg btn-block" type="submit" name="submit">Add</button>
          </form>
        </div>
      </div>

      <footer class="my-5 pt-5 text-muted text-center text-small">
        <p class="mb-1">&copy; 2017-2018 Company Name</p>
        <ul class="list-inline">
          <li class="list-inline-item"><a href="#">Privacy</a></li>
          <li class="list-inline-item"><a href="#">Terms</a></li>
          <li class="list-inline-item"><a href="#">Support</a></li>
        </ul>
      </footer>
    </div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>