<?php

namespace Drupal\hcpss_school_vocabulary\Commands;

use Drush\Commands\DrushCommands;

class HcpssSchoolVocabularyCommands extends DrushCommands {

  /**
   * Import school terms from the API.
   *
   * @command hcpss:school-vocabulary:import
   * @usage hcpss:school-vocabulary:import
   *   Perform the import.
   */
  public function import() {
    $result = _hcpss_school_vocabulary_populate_schools();

    $this->output()->writeln(vsprintf('%d school terms created, %d updated.', [
      $result[SAVED_NEW],
      $result[SAVED_UPDATED],
    ]));
  }
}
