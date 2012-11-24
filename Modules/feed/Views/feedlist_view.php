<?php
  /*
    All Emoncms code is released under the GNU Affero General Public License.
    See COPYRIGHT.txt and LICENSE.txt.

    ---------------------------------------------------------------------
    Emoncms - open source energy visualisation
    Part of the OpenEnergyMonitor project:
    http://openenergymonitor.org

    list.js - is a javascript dynamic user interface list creator.

  */

  global $path;
?>

<script type="text/javascript" src="<?php print $path; ?>Lib/flot/jquery.min.js"></script>
<script type="text/javascript" src="<?php print $path; ?>Lib/listjs/list.js"></script>

<div style="float:right;"><a href="api"><?php echo _("Feed API Help");?></a></div>
<h2><?php echo _('Feeds'); ?></h2>

<?php if ($feeds) { ?>

<div id="feedlist"></div>

<br><a href="deleted" class="btn btn-danger"><?php echo _('Deleted feeds'); ?></a>

<script type="text/javascript">

  // The list is created using list.js - a javascript dynamic user interface list creator created as part of this project
  // list.js is still in early development.

  var path =  "<?php echo $path; ?>";

  var items = <?php echo json_encode($feeds); ?>;

  var fields = 
  {
    'id':{}, 
    'name':
    {
      'input':"text"
    }, 
    'tag':
    {
      'input':"text"
    }, 
    'datatype':
    {
      'format':"select",
      'input':"select", 
      'options':{0:"UNDEFINED", 1:"REALTIME", 2:"DAILY", 3:"HISTOGRAM"}
    }, 
    'updated':
    { 
      'format':"updated"
    }, 
    'value':
    {
      'format':"value", 
    }
  };

  var group_prefix = "";
  var controller = "feed";
  var listaction = "list";
  var deletable = true;
  var restoreable = false;

  var group_properties = {};

  listjs("feedlist", "tag", items, fields, group_properties, 5000);

</script>

<?php } else { ?>

<div class="alert alert-block">
<h4 class="alert-heading">No feeds created</h4>
<p>Feeds are where your monitoring data is stored. The recommended route for creating feeds is to start by creating inputs (see the inputs tab). Once you have inputs you can either log them straight to feeds or if you want you can add various levels of input processing to your inputs to create things like daily average data or to calibrate inputs before storage.</p>
</div>

<?php } ?> 
