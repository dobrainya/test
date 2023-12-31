<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Image]].
 *
 * @see Image
 */
class ImageQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('status IS NOT NULL');
    }

    /**
     * {@inheritdoc}
     * @return Image[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return Image|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
