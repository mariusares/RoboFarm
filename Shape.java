import java.awt.*;


public abstract class Shape {
    private Color color;
    protected boolean filled;
    protected int xCenter;
    protected int yCenter;
    public Shape(Color color, boolean filled, int xCenter, int yCenter) {
        this.color = color;
        this.filled = filled;
        this.xCenter = xCenter;
        this.yCenter = yCenter;
          }
    public abstract BoundingBox setupBoundingBox();

    public Color getColor() {
        return color;
    }

    public void setColor(Color color) {
        this.color = color;
    }

    public boolean isFilled() {
        return filled;
    }

    public void setFilled(boolean filled) {
        this.filled = filled;
    }

    public int getxCenter() {
        return xCenter;
    }

    public void setxCenter(int xCenter) {
        this.xCenter = xCenter;
    }

    public int getyCenter() {
        return yCenter;
    }

    public void setyCenter(int yCenter) {
        this.yCenter = yCenter;
    }

    public abstract void drawShape(Graphics g,  boolean drawShapeName, boolean displayBoundingBox);


    protected void drawName(Graphics g){
        g.setColor(color);
        g.drawString(this.getClass().getSimpleName(),xCenter,yCenter);
    }
    public void drawBoundingBox(Graphics g){
       BoundingBox bounding = setupBoundingBox();
        g.setColor(Color.BLACK);


        g.drawLine(bounding.getTopRight().getX(),bounding.getTopRight().getY(), bounding.getTopRight().getX(), bounding.getBottomLeft().getY());
        g.drawLine(bounding.getTopRight().getX(),bounding.getBottomLeft().getY(), bounding.getBottomLeft().getX(), bounding.getBottomLeft().getY());
        g.drawLine(bounding.getBottomLeft().getX(),bounding.getTopRight().getY(), bounding.getTopRight().getX(), bounding.getTopRight().getY());
        g.drawLine(bounding.getBottomLeft().getX(),bounding.getBottomLeft().getY(), bounding.getBottomLeft().getX(), bounding.getTopRight().getY());
           }
    public void toggleFilling(){
        filled = !filled;
    }
    public boolean getFilled(){
        return filled;
    }




  /*  @Override
    public String toString() {
        return "Shape{" +
                "color=" + color +
                ", filled=" + filled +
                ", xCenter=" + xCenter +
                ", yCenter=" + yCenter +
                '}' ;
    }*/
}
