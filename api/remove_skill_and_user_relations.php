<? //FILIP ?>
<?
  //DB login
  require_once '../lib/php/meekrodb.class.php';
  require_once "../inc/db_credentials.php";

  //variables
  $errors = array();
  $data = array();

  $skill_id = 0;

  //Arguments
  if ( !empty($_REQUEST['skill_id'])){
    $skill_id = $_REQUEST['skill_id'];
  }

  //Check conditions/Validation
  if ( empty($_REQUEST['skill_id']) ) {
    $errors['skill_id'] = 'Skill ID required';
    $data['errors'] = $errors;
    echo json_encode($data); //Return data
    die();
  }

  // Check if skill exists
  $skill_existing = DB::query("SELECT * FROM skill WHERE skill.id=%i", $_REQUEST['skill_id']);
  if(DB::count() == 0)
  {
    $errors['exists'] = "Skill doesn't exist or is already deleted";
    $data['errors'] = $errors;

    echo json_encode($data); //Return data
    die();
  }

  // Delte from relationdatabase user_skill
  DB::query("DELETE FROM `user_skill` WHERE skill_id=%s", $_REQUEST['skill_id']);

  // Delete skill aswell
  DB::delete('skill', "id=%s", $_REQUEST['skill_id']);

  // Also delete all related posts from skill_message
  DB::delete('skill_message', "skill_id=%s", $_REQUEST['skill_id']);

  //Set return statement
  if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
  } else {
    $data['success'] = true;
    $data['message'] = 'Deleted skill from all users';
  }

  //Return data
  echo json_encode($data);
?>
