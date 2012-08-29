<?php echo '<?xml version="1.0" encoding="utf-8"?>' ?>

<fo:root xmlns:fo="http://www.w3.org/1999/XSL/Format">

  <fo:layout-master-set>

    <!-- layout for the first page -->
    <fo:simple-page-master master-name="first"
          page-height="21cm"
          page-width="29.7cm"
          margin-top="0cm"
          margin-bottom="0cm"
          margin-left="0cm"
          margin-right="0cm">
      <fo:region-body margin-top="3.5cm" margin-left="3cm" margin-right="2cm" margin-bottom="2.2cm"/>
      <fo:region-before extent="0cm"/>
      <fo:region-after extent="14.3cm"/>
      <fo:region-start extent="0.7cm"/>
    </fo:simple-page-master>

    <!-- layout for the other pages -->
    <fo:simple-page-master master-name="rest"
                  page-height="21cm"
                  page-width="29.7cm"
                  margin-top="0cm"
                  margin-bottom="0cm"
                  margin-left="0cm"
                  margin-right="0cm">
      <fo:region-body margin-top="3.5cm" margin-left="3cm" margin-right="2cm" margin-bottom="2.2cm"/>
      <fo:region-before extent="0cm"/>
      <fo:region-after extent="14.3cm"/>
      <fo:region-start extent="0.7cm"/>
    </fo:simple-page-master>

<fo:page-sequence-master master-name="basicPSM" >
  <fo:repeatable-page-master-alternatives>
    <fo:conditional-page-master-reference master-reference="first"
      page-position="first" />
    <fo:conditional-page-master-reference master-reference="rest"
      page-position="rest" />
    <!-- recommended fallback procedure -->
    <fo:conditional-page-master-reference master-reference="rest" />
  </fo:repeatable-page-master-alternatives>
</fo:page-sequence-master>

  </fo:layout-master-set>
  <!-- end: defines page layout -->

  <!-- actual layout -->
  <fo:page-sequence master-reference="basicPSM" initial-page-number="1">

    <!-- header -->
    <fo:static-content flow-name="xsl-region-before">
        <fo:block-container position="absolute" left="20px">
            <fo:block id="N2545">
                <fo:external-graphic src="<?php echo sfConfig::get('sf_web_dir') ?>/images/aranova/enc_documentos_A4_land.png"/>
            </fo:block>
       </fo:block-container>
<?php include_slot('title') ?>
    </fo:static-content>

    <fo:static-content flow-name="xsl-region-after">
        <fo:block-container position="absolute" top="0cm" left="20px">
            <fo:block id="N2547">
                <fo:external-graphic src="<?php echo sfConfig::get('sf_web_dir') ?>/images/aranova/watermark+foot_documentos_A4_land.png"/>
            </fo:block>
        </fo:block-container>

        <fo:block-container position="absolute" left="1cm" right="1cm" top="12.9cm">
        <fo:block id="N2546">
        <!-- table start -->
        <fo:table table-layout="fixed" width="100%" border-collapse="separate">
            <fo:table-column column-width="40%"/>
            <fo:table-column column-width="30%"/>
            <fo:table-column column-width="30%"/>
            <fo:table-body>
                <fo:table-row>
                    <fo:table-cell>
                        <fo:block text-align="center" color="#111" font-size="8pt" font-family="DejaVuSansCondensed" line-height="12pt">Valle de Broto 9-11, 1ª planta, of. 4</fo:block>
                    </fo:table-cell>
                    <fo:table-cell>
                        <fo:block text-align="center" color="#111" font-size="8pt" font-family="DejaVuSansCondensed" line-height="12pt">Tel. +34 976 517 611</fo:block>
                    </fo:table-cell>
                    <fo:table-cell>
                        <fo:block text-align="center" color="#111" font-size="8pt" font-family="DejaVuSansCondensed" line-height="12pt">
                            <fo:basic-link external-destination="http://www.aranova.es" color="#111">http://www.aranova.es</fo:basic-link>
                        </fo:block>
                    </fo:table-cell>
                </fo:table-row>
                <fo:table-row>
                    <fo:table-cell>
                        <fo:block text-align="center" color="#111" font-size="8pt" font-family="DejaVuSansCondensed" line-height="12pt">50015 Zaragoza - España</fo:block>
                    </fo:table-cell>
                    <fo:table-cell>
                        <fo:block text-align="center" color="#111" font-size="8pt" font-family="DejaVuSansCondensed" line-height="12pt">Fax +34 976 517 611</fo:block>
                    </fo:table-cell>
                    <fo:table-cell>
                        <fo:block text-align="center" color="#111" font-size="8pt" font-family="DejaVuSansCondensed" line-height="12pt">email:
                            <fo:basic-link external-destination="mailto:info@aranova.es" color="#111">info@aranova.es</fo:basic-link>
                        </fo:block>
                    </fo:table-cell>
                </fo:table-row>
            </fo:table-body>
        </fo:table>
        <!-- table end -->
                </fo:block>
                </fo:block-container>
    </fo:static-content>

    <fo:static-content flow-name="xsl-region-start">
            <fo:block-container reference-orientation="90" position="absolute" left="0.7cm" top="2cm" width="15cm">
               <fo:block color="#111" font-size="8pt" font-family="DejaVuSans" line-height="10pt">
                R.M. De Zaragoza ,Tomo 3.293, libro 0, folio 173, hoja Z-39486 – C.I.F. B-99078248
                </fo:block>
            </fo:block-container>
    </fo:static-content>

    <fo:flow flow-name="xsl-region-body">
      <!-- defines document header -->
        <?php include_slot('header') ?>

<?php echo $sf_content ?>

    </fo:flow>
  </fo:page-sequence>
</fo:root>
