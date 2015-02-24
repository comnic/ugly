<div class="modal">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal"
			aria-hidden="true">&times;</button>
		<h3>로그인</h3>
	</div>
	<form class="form-horizontal" action="/index.php/auth/authentication" method="post">

		<div class="modal-body">


			<div class="control-group">
				<label class="control-label" for="id">아이디</label>
				<div class="controls">
					<input type="text" name="id" id="id" placeholder="아이디">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="password">비밀번호</label>
				<div class="controls">
					<input type="password" name="password" id="password" placeholder="Password">
				</div>
			</div>



		</div>
		<div class="modal-footer">
			<input type="submit" class="btn btn-primary" value="로그인" />
		</div>
	</form>

</div>
