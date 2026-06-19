<?php

require_once "Pendaftaran.php";

class PendaftaranKedinasan extends Pendaftaran
{
    protected $skIkatanDinas;
    protected $instansiSponsor;

    public function __construct(
        $id_pendaftaran = null,
        $nama_calon = null,
        $asal_sekolah = null,
        $nilai_ujian = null,
        $biaya_pendaftaran_dasar = null,
        $sk_ikatan_dinas = null,
        $instansi_sponsor = null
    ) {
        parent::__construct($id_pendaftaran, $nama_calon, $asal_sekolah, $nilai_ujian, $biaya_pendaftaran_dasar);

        $this->skIkatanDinas = $sk_ikatan_dinas;
        $this->instansiSponsor = $instansi_sponsor;
    }

    public function getSkIkatanDinas()
    {
        return $this->skIkatanDinas;
    }

    public function getInstansiSponsor()
    {
        return $this->instansiSponsor;
    }

    public function hitungTotalBiaya()
    {
        return $this->biayaPendaftaranDasar;
    }

    public function tampilkanInfoJalur()
    {
        return "Jalur Kedinasan - SK Ikatan Dinas: " . $this->skIkatanDinas . ", Instansi Sponsor: " . $this->instansiSponsor;
    }

    public function getDaftarKedinasan($db)
    {
        $query = "SELECT * FROM tabel_pendaftaran
WHERE jalur_pendaftaran = 'Kedinasan'";

        $stmt = $db->prepare($query);
        $stmt->execute();

        $dataKedinasan = [];

        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $dataKedinasan[] = new PendaftaranKedinasan(
                $row['id_pendaftaran'],
                $row['nama_calon'],
                $row['asal_sekolah'],
                $row['nilai_ujian'],
                $row['biaya_pendaftaran_dasar'],
                $row['sk_ikatan_dinas'],
                $row['instansi_sponsor']
            );
        }

        return $dataKedinasan;
    }
}