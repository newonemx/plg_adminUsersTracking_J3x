<?php

defined('_JEXEC') or die();

class plgAdminUsersTracking extends JPlugin{
    
	public function onUserBeforeSave($user, $isnew, $data) {

        $app = JFactory::getApplication();

        if ($app->isAdmin()) {

            $db = JFactory::getDbo();

            $columns = ['user_id_modifier',

                'user_id_modified',

                'old_data',

                'new_data'];

            $userAdmin = JFactory::getUser();

            $values = [

                $db->quote($userAdmin->id),

                $db->quote($user['id']),

                $db->quote(json_encode($user)),

                $db->quote(json_encode($data))];

            $query = $db->getQuery(true);

            $query

                    ->insert($db->quoteName('core_admin_user_logs'))

                    ->columns($db->quoteName($columns))

                    ->values(implode(',', $values));

            $db->setQuery($query);

            $db->execute();

        }

    }
}
