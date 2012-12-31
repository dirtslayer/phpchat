<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet
	version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method = "xml" omit-xml-declaration="yes" />
<xsl:template match="/">
	        <div class="msgs">
                <xsl:apply-templates select="/chat/msg" />
            </div>
</xsl:template>

<xsl:template match="/chat/msg">

    <div class="msg">
        <div class="user" >
            <xsl:value-of select="user" />
        </div>
        <div class="txt">
        	<xsl:attribute name="style">
        		color :
        		<xsl:value-of select="txt/@color"></xsl:value-of>
        	</xsl:attribute>
            <xsl:value-of select="txt" />
        </div>
</div>
</xsl:template>
</xsl:stylesheet>
