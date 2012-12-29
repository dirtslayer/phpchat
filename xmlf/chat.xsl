<?xml version="1.0" encoding="ISO-8859-1"?>
<xsl:stylesheet
	version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

        <!--   need to get the html5 header -->
<xsl:template match="/">
	<HTML>
	<HEAD>
            <TITLE><xsl:value-of select="/chat/@event"/></TITLE>
            <LINK REL="stylesheet" TYPE="text/css" HREF="./xmlf/chat.css"></LINK>
	</HEAD>
        <BODY>
            <xsl:apply-templates select="/chat/msg" />
	</BODY>
	</HTML>
</xsl:template>

<xsl:template match="/chat/msg">

    <div class="msg">
        <div class="user" >
            <xsl:value-of select="user" />
        </div>
        <div class="txt">
            <xsl:value-of select="txt" />
        </div>
</div>
</xsl:template>
</xsl:stylesheet>
