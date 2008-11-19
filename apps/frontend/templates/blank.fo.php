<?php echo '<?xml version="1.0" encoding="utf-8"?>' ?>

<fo:root xmlns:fo="http://www.w3.org/1999/XSL/Format">

  <fo:layout-master-set>

    <!-- layout for the other pages -->
    <fo:simple-page-master master-name="rest"
                  page-height="29.7cm"
                  page-width="21cm"
                  margin-top="0cm"
                  margin-bottom="0cm"
                  margin-left="0cm"
                  margin-right="0cm">
      <fo:region-body margin-top="2cm" margin-left="2cm" margin-right="1.5cm" margin-bottom="1.2cm"/>
      <fo:region-before extent="0cm"/>
      <fo:region-after extent="14.3cm"/>
      <fo:region-start extent="0.7cm"/>
    </fo:simple-page-master>

<fo:page-sequence-master master-name="basicPSM" >
  <fo:repeatable-page-master-alternatives>
    <fo:conditional-page-master-reference master-reference="rest" />
  </fo:repeatable-page-master-alternatives>
</fo:page-sequence-master>

  </fo:layout-master-set>
  <!-- end: defines page layout -->

  <!-- actual layout -->
  <fo:page-sequence master-reference="basicPSM" initial-page-number="1">

    <!-- header -->
    <fo:static-content flow-name="xsl-region-before">
        <fo:block></fo:block>
    </fo:static-content>

    <fo:static-content flow-name="xsl-region-after">
        <fo:block></fo:block>
    </fo:static-content>

    <fo:static-content flow-name="xsl-region-start">
        <fo:block></fo:block>
    </fo:static-content>

    <fo:flow flow-name="xsl-region-body">
      <!-- defines document header -->
        <?php include_slot('header') ?>

<?php echo $sf_data->getRaw('sf_content') ?>

    </fo:flow>
  </fo:page-sequence>
</fo:root>
