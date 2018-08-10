<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "peminjaman".
 *
 * @property int $id
 * @property int $id_buku
 * @property int $id_anggota
 * @property string $tanggal_pinjam
 * @property string $tanggal_kembali
 */
class Peminjaman extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'peminjaman';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id_buku', 'id_anggota', 'tanggal_pinjam', 'tanggal_kembali'], 'required'],
            [['id_buku', 'id_anggota'], 'integer'],
            [['tanggal_pinjam', 'tanggal_kembali'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_buku' => 'Buku',
            'id_anggota' => 'Anggota',
            'tanggal_pinjam' => 'Tanggal Pinjam',
            'tanggal_kembali' => 'Tanggal Kembali',
        ];
    }

    public function getAnggota()
    {
        return $this->hasOne(Anggota::class, ['id' => 'id_anggota']);
    }

    public function getBuku()
    {
        return $this->hasOne(Buku::class, ['id' => 'id_buku']);
    }

    public function getManyAnggotaPinjam()
    {
        return $this->hasMany(Perusahaan::class, ['id_anggota' => 'id']);
    }
    public function getManyAnggotaCount()
    {
        return count($this->manyAnggota);
    }
    public function getListGrafikPeminjaman()
    {
        $data = [];
        foreach (static::find()->all() as $anggota) {
            $data[] = [$anggota->nama, (int) $anggota->getManyAnggotaPinjam()->count()];
        }
        return $data;
    }

    public static function getCount()
    {
        return static::find()->count();
    }
}
