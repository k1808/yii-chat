<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m201020_090936_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%message}}', [
            'id' => $this->primaryKey(),
            'creation_time' => $this->dateTime()->defaultValue(0)->notNull(),
            'user_id' => $this->integer(),
            'disabled' => $this->tinyInteger()->defaultValue(1),
            'messages' => $this->text(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-message-user_id}}',
            '{{%message}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-message-user_id}}',
            '{{%message}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-message-user_id}}',
            '{{%message}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-message-user_id}}',
            '{{%message}}'
        );

        $this->dropTable('{{%message}}');
    }
}
