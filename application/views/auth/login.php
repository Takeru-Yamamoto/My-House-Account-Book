<canvas id="canvas"></canvas>
<section id="body">
  <h1><?php echo lang('login_heading'); ?></h1>
  <p><?php echo lang('login_subheading'); ?></p>

  <div id="infoMessage"><?php echo $message; ?></div>

  <?php echo form_open("auth/login"); ?>

  <p>
    <?php echo lang('login_identity_label', 'identity'); ?>
    <?php echo form_input($identity); ?>
  </p>

  <p>
    <?php echo lang('login_password_label', 'password'); ?>
    <?php echo form_input($password); ?>
  </p>

  <p>
    <?php echo lang('login_remember_label', 'remember'); ?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
  </p>


  <p><?php echo form_submit('submit', lang('login_submit_btn')); ?></p>

  <?php echo form_close(); ?>

  <p><a href="forgot_password"><?php echo lang('login_forgot_password'); ?></a></p>
</section>

<style>
  html,
  body {
    height: 100%;
  }

  canvas {
    height: 100%;
    width: 100%;
    margin: 0;
    padding: 0;
    min-height: 100%;
    width: 100%;
  }

  #canvas {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  #body {
    background-color: rgba(255, 255, 255, .8);
    border-radius: .25em;
    box-shadow: 0 0 .25em rgba(0, 0, 0, .25);
    box-sizing: border-box;
    left: 50%;
    padding: 10vmin;
    position: fixed;
    text-align: center;
    top: 50%;
    transform: translate(-50%, -50%);
  }
</style>
<script>
  var livePatern = {
    canvas: null,
    context: null,
    cols: 0,
    rows: 0,
    colors: [252, 251, 249, 248, 241, 240],
    triangleColors: [],
    destColors: [],

    init: function() {
      this.canvas = document.getElementById('canvas');
      this.context = this.canvas.getContext('2d');
      this.cols = Math.floor(document.body.clientWidth / 24);
      this.rows = Math.floor(document.body.clientHeight / 24) + 1;

      this.canvas.width = document.body.clientWidth;
      this.canvas.height = document.body.clientHeight;

      this.drawBackground();
      this.animate();
    },

    drawTriangle: function(x, y, color, inverted) {
      inverted = inverted == undefined ? false : inverted;

      this.context.beginPath();
      this.context.moveTo(x, y);
      this.context.lineTo(inverted ? x - 22 : x + 22, y + 11);
      this.context.lineTo(x, y + 22);
      this.context.fillStyle = "rgb(" + color + "," + color + "," + color + ")";
      this.context.fill();
      this.context.closePath();
    },

    getColor: function() {
      return this.colors[(Math.floor(Math.random() * 6))];
    },

    drawBackground: function() {
      var eq = null;
      var x = this.cols;
      var destY = 0;
      var color, y;

      while (x--) {
        eq = x % 2;
        y = this.rows;

        while (y--) {
          destY = Math.round((y - 0.5) * 24);

          this.drawTriangle(x * 24 + 2, eq == 1 ? destY : y * 24, this.getColor());
          this.drawTriangle(x * 24, eq == 1 ? destY : y * 24, this.getColor(), true);
        }
      }
    },

    animate: function() {
      var me = this;

      var x = Math.floor(Math.random() * this.cols);
      var y = Math.floor(Math.random() * this.rows);
      var eq = x % 2;

      if (eq == 1) {
        me.drawTriangle(x * 24, Math.round((y - 0.5) * 24), this.getColor(), true);
      } else {
        me.drawTriangle(x * 24 + 2, y * 24, this.getColor());
      }

      setTimeout(function() {
        me.animate.call(me);
      }, 10);
    },
  };

  ! function() {
    livePatern.init();
  }()
</script>