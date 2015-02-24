<div>  
  <div class="span4"></div>
  <div class="span4">
    <?php echo validation_errors(); ?>
    <form class="form-horizontal" action="/index.php/auth/register" method="post">
      <div class="control-group">
        <label class="control-label" for="inputEmail">아이디</label>
        <div class="controls">
          <input type="text" id="m_id" name="m_id" value="<?php echo set_value('m_id'); ?>" placeholder="아이디">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="password">비밀번호</label>
        <div class="controls">
          <input type="password" id="password" name="password" value="<?php echo set_value('password'); ?>"   placeholder="비밀번호">
        </div>
      </div>      
      <div class="control-group">
        <label class="control-label" for="re_password">비밀번호 확인</label>
        <div class="controls">
          <input type="password" id="re_password" name="re_password" value="<?php echo set_value('re_password'); ?>"   placeholder="비밀번호 확인">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="name">이름</label>
        <div class="controls">
          <input type="text" id="name" name="name" value="<?php echo set_value('name'); ?>"  placeholder="이름">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="name">이메일</label>
        <div class="controls">
          <input type="text" id="email" name="email" value="<?php echo set_value('email'); ?>"  placeholder="이메일">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label"></label>
        <div class="controls">
          <input type="submit" class="btn btn-primary" value="회원가입" />
        </div>
      </div>      
    </form>  
  </div>
  <div class="span4"></div>  
</div>